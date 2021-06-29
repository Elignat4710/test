<?php

namespace App\Providers;

use App\Repos\CategoryRepository;
use App\Repos\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CategoryRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
    }
}
