<?php

namespace App\Repos\Interfaces;

interface CategoryRepositoryInterface extends AbstractRepositoryInterface
{
    public function search(string $search);
}
