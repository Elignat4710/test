<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Repos\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repos\Interfaces\TagRepositoryInterface;
use App\Repos\Interfaces\PostRepositoryInterface;
use App\Repos\Interfaces\CategoryRepositoryInterface;

class PostController extends Controller
{
    protected $postModel;
    protected $categoryModel;
    protected $tagModel;
    protected $fileModel;

    public function __construct(
        PostRepositoryInterface $postModel,
        CategoryRepositoryInterface $categoryModel,
        TagRepositoryInterface $tagModel,
        FileRepository $fileModel
    )
    {
        $this->postModel = $postModel;
        $this->categoryModel = $categoryModel;
        $this->tagModel = $tagModel;
        $this->fileModel = $fileModel;
    }

    /**
     * Получение всех постов и поиск по тегам
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allPosts(Request $request)
    {
        if ($request->has('tag')) {
            $tags = $this->postModel->getPostsWithExistTag($request->tag);
        } else {
            $model = $this->postModel->selfModel();
        }

        return view('index', [
            'posts' => isset($tags) ? $tags : $this->postModel->paginate($model),
            'title' => 'Все посты',
            'count' => isset($tags) ? $this->postModel->count($tags) : $this->postModel->count($model)
        ]);
    }

    /**
     * Получить список всех постов авторизированого юзера
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function myPost()
    {
        $model = $this->postModel->where([
            'user_id' => Auth::user()->id
        ]);

        return view('index', [
            'posts' => $this->postModel->paginate($model),
            'title' => 'Мои посты',
            'count' => $this->postModel->count($model)
        ]);
    }

    /**
     * Получить список популярных постов
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function popularPosts()
    {
        $model = $this->postModel->orderBy('views', 'desc');

        return view('index', [
            'posts' => $this->postModel->paginate($model),
            'title' => 'Популярные посты',
            'count' => $this->postModel->count($model)
        ]);
    }

    /**
     * Получить все посты без комментов
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postsWithoutComments()
    {
        $model = $this->postModel->postsWithoutComment();

        return view('index', [
            'posts' => $this->postModel->paginate($model),
            'title' => 'Посты без комментариев',
            'count' => $this->postModel->count($model)
        ]);
    }

    /**
     * Просмотреть пост
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post = $this->postModel->find($id);

        // Увеличиваем количество просмотров у поста
        $post->views = $post->views + 1;

        $post = $this->postModel->save($post);

        $comments = $post->comments;

        return view('post-show', [
            'post' => $post,
            'comments' => $comments,
            'count' => $post->countPost()
        ]);
    }

    /**
     * Показать вьюху для создания поста
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreatePost()
    {
        return view('create-post');
    }

    /**
     * Создать пост
     *
     * @param Request $request
     * @return mixed
     */
    public function createPost(CreatePostRequest $request)
    {
        $request->validated();

        $tags = $request->tags;
        $model = $this->postModel->selfModel();
        $category = $this->categoryModel->firstOrCreate(['name' => $request->category_name]);

        if ($request->hasFile('photo')) {
            $file = $this->fileModel->create([
                'name' => $request->file('photo')->store('posts', 'public')
            ]);
        }

        $array = array_merge(
            $request->all(),
            [
                'category_id' => $category->id,
                'file_id' => isset($file) ? $file->id : 2
            ]
        );

        $model = $this->postModel->fill($model, $array);
        $model = $this->postModel->save($model);

        $tagModel = [];
        foreach ($tags as $tag) {
            $tagModel[] = $this->tagModel->firstOrCreate(['name' => $tag])->id;
        }

        $this->postModel->attachTags($model, $tagModel);

        return redirect()->back()->withSuccess('Пост создан успешно');
    }

    /**
     * Показать вьюху для редактирования
     *
     * @param $user_id
     * @param $post_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showUpdatePost($user_id, $post_id)
    {
        if (Auth::user()->id != $user_id) {
            return redirect()->route('index')->withErrors(['Не жульничай, не твой пост']);
        }

        $model = $this->postModel->where([
            'id' => $post_id,
            'user_id' => $user_id
        ]);
        $model = $this->postModel->first($model);

        return view('update-post', [
            'post' => $model
        ]);
    }

    /**
     * Обновить пост
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost(CreatePostRequest $request)
    {
        if (Auth::user()->id != $request->user_id) {
            return redirect()->route('index')->withErrors(['Не жульничай, не твой пост']);
        }

        $request->validated();

        $tags = $request->tags;
        $category = $this->categoryModel->firstOrCreate(['name' => $request->category_name]);

        $model = $this->postModel->where([
            'id' => $request->post_id,
            'user_id' => $request->user_id
        ]);
        $model = $this->postModel->first($model);

        if ($request->hasFile('photo')) {
            $file = $this->fileModel->create([
                'name' => $request->file('photo')->store('posts', 'public')
            ]);

            $model = $this->postModel->update($model, [
                'file_id' => $file->id
            ]);
        } else {
            $file = $model->file;
        }

        $array = array_merge(
            $request->all(),
            [
                'category_id' => $category->id,
                'file_id' => $file->id
            ]
        );

        $model = $this->postModel->fill($model, $array);
        $model = $this->postModel->save($model);

        if (isset($tags)) {
            $tagModel = [];
            foreach ($tags as $tag) {
                $tagModel[] = $this->tagModel->firstOrCreate(['name' => $tag])->id;
            }
            $this->postModel->attachTags($model, $tagModel);
        }

        return redirect()->back()->withSuccess('Пост успешно обновлен');
    }
}
