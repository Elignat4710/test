<?php

namespace App\Providers;

use App\Repos\CommentRepository;
use App\Repos\Interfaces\CommentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CommentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );
    }
}
