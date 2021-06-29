<?php

namespace App\Providers;

use App\Repos\Interfaces\TagRepositoryInterface;
use App\Repos\TagRepository;
use Illuminate\Support\ServiceProvider;

class TagRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TagRepositoryInterface::class,
            TagRepository::class
        );
    }
}
