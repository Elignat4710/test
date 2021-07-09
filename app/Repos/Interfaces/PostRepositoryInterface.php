<?php

namespace App\Repos\Interfaces;

use App\Models\Post;
use App\Models\Tag;

interface PostRepositoryInterface
{
    public function postsWithoutComment();

    public function getPostsWithExistTag($tagName);

    public function attachTags(Post $model, array $tags);
}
