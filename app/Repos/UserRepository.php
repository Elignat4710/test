<?php

namespace App\Repos;

use App\Models\User;
use App\Repos\AbstractClass\AbstractRepository;

class UserRepository extends AbstractRepository
{
    protected $class = User::class;
}
