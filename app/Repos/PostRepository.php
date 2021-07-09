<?php

namespace App\Repos;

use App\Models\Tag;
use App\Models\Post;
use App\Repos\AbstractClass\AbstractRepository;
use App\Repos\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    protected $class = Post::class;

    public function postsWithoutComment()
    {
        return $this->model::select('posts.*')
            ->selectRaw('count(comments.post_id) as counter')
            ->leftJoin(DB::raw('comments'), function ($join) {
                $join->on('comments.post_id', '=', 'posts.id');
            })
            ->groupBy('posts.id')
            ->having('counter', 0);
    }

    public function getPostsWithExistTag($tagName)
    {
        return Tag::where('name', $tagName)->first()->posts;
    }

    public function attachTags(Post $model, array $tags)
    {
        return $model->tags()->sync($tags);
    }
}
