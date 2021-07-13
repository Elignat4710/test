<?php

namespace App\Repos\Interfaces;

use App\Models\Post;
use App\Models\Tag;

interface PostRepositoryInterface
{
    /**
     * Возвращает все посты без комментов
     *
     * @return mixed
     */
    public function postsWithoutComment();

    /**
     * Все посты с определенным тегом
     *
     * @param string $tagName
     * @return mixed
     */
    public function getPostsWithExistTag(string $tagName);

    /**
     * Прикрепить теги к постам
     *
     * @param Post $model
     * @param array $tags
     * @return mixed
     */
    public function attachTags(Post $model, array $tags);
}
