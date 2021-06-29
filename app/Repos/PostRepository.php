<?php

namespace App\Repos;

use App\Models\Tag;
use App\Models\Post;
use App\Repos\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function instance()
    {
        return new Post;
    }

    public function getPost($id)
    {
        return Post::find($id);
    }

    public function save($post)
    {
        $post->save();
        return $post->refresh();
    }

    public function where(array $options)
    {
        return Post::where($options);
    }

    public function orderBy($field, $sort)
    {
        return Post::orderBy($field, $sort);
    }

    public function postsWithoutComment()
    {
        return Post::select('posts.*')
            ->selectRaw('count(comments.post_id) as counter')
            ->leftJoin(\DB::raw('comments'), function ($join) {
                $join->on('comments.post_id', '=', 'posts.id');
            })
            ->groupBy('posts.id')
            ->having('counter', 0);
    }

    public function getPostsWithExistTag($tagName)
    {
        return Tag::where('name', $tagName)->first()->posts;
    }

    public function fill(Post $model, array $array)
    {
        return $model->fill($array);
    }

    public function attachTags(Post $model, array $tags)
    {
        return $model->tags()->sync($tags);
    }

    public function first($model)
    {
        return $model->first();
    }
}
