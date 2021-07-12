<?php

namespace App\Repos;

use App\Models\File;
use App\Repos\AbstractClass\AbstractRepository;

class FileRepository extends AbstractRepository
{
    protected $class = File::class;
}
