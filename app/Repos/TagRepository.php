<?php

namespace App\Repos;

use App\Models\Tag;
use App\Repos\AbstractClass\AbstractRepository;
use App\Repos\Interfaces\TagRepositoryInterface;

class TagRepository extends AbstractRepository implements TagRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Tag());
    }

    public function search(string $search)
    {
        return $this->model->search($search);
    }
}
