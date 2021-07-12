<?php

namespace App\Repos;

use App\Models\Comment;
use App\Repos\AbstractClass\AbstractRepository;

class CommentRepository extends AbstractRepository
{
    protected $class = Comment::class;
}
