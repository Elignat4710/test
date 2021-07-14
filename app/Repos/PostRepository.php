<?php

namespace App\Repos;

use App\Models\Tag;
use App\Models\Post;
use App\Repos\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Repos\AbstractClass\AbstractRepository;

class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    protected $class = Post::class;

    public function postsWithoutComment()
    {
        return $this->model->doesntHave('comments');
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
