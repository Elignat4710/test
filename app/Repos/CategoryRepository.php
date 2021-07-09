<?php

namespace App\Repos;

use App\Models\Category;
use App\Repos\AbstractClass\AbstractRepository;
use App\Repos\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    protected $class = Category::class;
    
    public function search(string $search)
    {
        return $this->model->search($search);
    }
}
