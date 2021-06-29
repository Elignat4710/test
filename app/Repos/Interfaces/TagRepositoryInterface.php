<?php 

namespace App\Repos\Interfaces;

interface TagRepositoryInterface
{
    public function firstOrCreate(array $options);
}