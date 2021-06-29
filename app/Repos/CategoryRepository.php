<?php

namespace App\Repos;

use App\Models\Category;
use App\Repos\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function firstOrCreate(array $options)
    {
        return Category::firstOrCreate($options);
    }
}
