<?php

namespace App\Repos;

use App\Models\Tag;
use App\Repos\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function firstOrCreate(array $options)
    {
        return Tag::firstOrCreate($options);
    }
}
