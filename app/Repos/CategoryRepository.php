<?php

namespace App\Repos;

use App\Models\Category;
use App\Repos\AbstractClass\AbstractRepository;
use App\Repos\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Category());
    }
    
    public function search(string $search)
    {
        return $this->model->search($search);
    }
}
