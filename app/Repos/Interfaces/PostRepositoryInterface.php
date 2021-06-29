<?php

namespace App\Repos\Interfaces;

use App\Models\Post;
use App\Models\Tag;

interface PostRepositoryInterface
{
    public function instance();

    public function getPost($id);

    public function save(Post $post);

    public function where(array $options);

    public function orderBy($field, $sort);

    public function postsWithoutComment();

    public function getPostsWithExistTag($tagName);

    public function fill(Post $model, array $array);

    public function attachTags(Post $model, array $tags);

    public function first($model);
}
