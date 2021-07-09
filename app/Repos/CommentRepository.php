<?php

namespace App\Repos;

use App\Models\Comment;
use App\Repos\AbstractClass\AbstractRepository;
use App\Repos\Interfaces\CommentRepositoryInterface;

class CommentRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(new Comment());
    }
}
