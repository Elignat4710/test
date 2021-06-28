<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if (URL::current() == route('my-post')) {
            $posts = Post::where('user_id', Auth::user()->id);
            $title = 'Мои посты';
        } elseif (URL::current() == route('popular-post')) {
            $posts = Post::orderBy('likes', 'desc');
            $title = 'Популярные посты';
        } elseif (URL::current() == route('without-comment-post')) {
            $posts = Post::select('posts.*')
                ->selectRaw('count(comments.post_id) as counter')
                ->leftJoin(\DB::raw('comments'), function ($join) {
                    $join->on('comments.post_id', '=', 'posts.id');
                })
                ->groupBy('posts.id')
                ->having('counter', 0);

            $title = 'Посты без комментариев';
        } else {
            if ($request->has('tag')) {
                $tag = Tag::where('name', $request->tag)->first()->posts;
            } else {
                $posts = new Post();
            }
            $title = 'Все посты';
        }

        return view('index', [
            'posts' => isset($tag) ? $tag : $posts->paginate(15),
            'title' => $title,
            'count' => isset($tag) ? $tag->count() : $posts->count()
        ]);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();

        $post->likes = $post->likes + 1;
        $post->save();

        return view('post-show', [
            'post' => $post
        ]);
    }

    public function showCreatePost()
    {
        return view('create-post');
    }

    public function createPost(Request $request)
    {
        $tags = json_decode($request->tag);
        $model = new Post;
        $category = Category::firstOrCreate(['name' => $request->category_name]);

        $array = array_merge($request->all(), ['category_id' => $category->id]);

        $model->fill($array);
        $model->save();

        foreach ($tags as $tag) {
            $tagModel = Tag::firstOrCreate(['name' => $tag]);
            $model->tags()->attach($tagModel);
        }

        return redirect()->back()->withSuccess('Пост создан успешно');
    }

    public function getCategory(Request $request)
    {
        return response()->json([
            'models' => Category::search($request->search)->get()
        ]);
    }

    public function getTag(Request $request)
    {
        return response()->json([
            'models' => Tag::search($request->search)->get()
        ]);
    }

    public function showUpdatePost($user_id, $post_id)
    {
        if (Auth::user()->id != $user_id) {
            return redirect()->route('index')->withErrors(['Не жульничай, не твой пост']);
        }

        $model = Post::where([
            'id' => $post_id,
            'user_id' => $user_id
        ])->first();

        return view('update-post', [
            'post' => $model
        ]);
    }

    public function updatePost(Request $request)
    {
        if (Auth::user()->id != $request->user_id) {
            return redirect()->route('index')->withErrors(['Не жульничай, не твой пост']);
        }

        $model = Post::where([
            'id' => $request->post_id,
            'user_id' => $request->user_id
        ])->first();

        $model->fill($request->all());
        $model->save();

        return redirect()->back()->withSuccess('Пост успешно обновлен');
    }
}
