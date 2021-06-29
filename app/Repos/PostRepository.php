<?php

namespace App\Repos;

use App\Models\Post;
use App\Repos\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function instance()
    {
        return new Post;
    }
}
