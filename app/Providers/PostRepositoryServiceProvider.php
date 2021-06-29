<?php

namespace App\Providers;

use App\Repos\Interfaces\PostRepositoryInterface;
use App\Repos\PostRepository;
use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }
}
