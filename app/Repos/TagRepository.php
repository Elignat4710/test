<?php

namespace App\Repos;

use App\Models\Tag;
use App\Repos\AbstractClass\AbstractRepository;
use App\Repos\Interfaces\TagRepositoryInterface;

class TagRepository extends AbstractRepository implements TagRepositoryInterface
{
    protected $class = Tag::class;
    
    public function search(string $search)
    {
        return $this->model->search($search);
    }
}
