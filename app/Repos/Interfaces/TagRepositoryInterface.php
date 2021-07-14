<?php

namespace App\Repos\Interfaces;

interface TagRepositoryInterface extends AbstractRepositoryInterface
{
    public function search(string $search);
}
