<?php

namespace App\Http\Controllers;

use App\Repos\Interfaces\CategoryRepositoryInterface;
use App\Repos\Interfaces\PostRepositoryInterface;
use App\Repos\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    protected $postModel;
    protected $categoryModel;
    protected $tagModel;
    
    public function __construct(PostRepositoryInterface $postModel, CategoryRepositoryInterface $categoryModel, TagRepositoryInterface $tagModel)
    {
        $this->postModel = $postModel;
        $this->categoryModel = $categoryModel;
        $this->tagModel = $tagModel;
    }

    /**
     * Показ главной страницы, с разными параметрами
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if (URL::current() == route('my-post')) {
            $posts = $this->postModel->where(['user_id' => Auth::user()->id]);
            $title = 'Мои посты';
        } elseif (URL::current() == route('popular-post')) {
            $posts = $this->postModel->orderBy('views', 'desc');
            $title = 'Популярные посты';
        } elseif (URL::current() == route('without-comment-post')) {
            $posts = $this->postModel->postsWithoutComment();
            $title = 'Посты без комментариев';
        } else {
            if ($request->has('tag')) {
                $tag = $this->postModel->getPostsWithExistTag($request->tag);
            } else {
                $posts = $this->postModel->instance();
            }
            $title = 'Все посты';
        }

        return view('index', [
            'posts' => isset($tag) ? $tag : $posts->paginate(15),
            'title' => $title,
            'count' => isset($tag) ? $tag->count() : $posts->count()
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
        $post = $this->postModel->getPost($id);

        $post->views = $post->views + 1;

        $post = $this->postModel->save($post);

        return view('post-show', [
            'post' => $post
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
    public function createPost(Request $request)
    {
        $tags = json_decode($request->tag);
        $model = $this->postModel->instance();
        $category = $this->categoryModel->firstOrCreate(['name' => $request->category_name]);

        $array = array_merge($request->all(), ['category_id' => $category->id]);

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
    public function updatePost(Request $request)
    {
        if (Auth::user()->id != $request->user_id) {
            return redirect()->route('index')->withErrors(['Не жульничай, не твой пост']);
        }

        $tags = json_decode($request->tag);
        $category = $this->categoryModel->firstOrCreate(['name' => $request->category_name]);
        $array = array_merge($request->all(), ['category_id' => $category->id]);

        $model = $this->postModel->where([
            'id' => $request->post_id,
            'user_id' => $request->user_id
        ]);
        $model = $this->postModel->first($model);

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
