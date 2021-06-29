<?php

namespace App\Repos\Interfaces;

interface CategoryRepositoryInterface
{
    public function firstOrCreate(array $options);
}
