<?php

namespace App\Providers;

use App\Repositories\OrderRepository\MysqlOrderRepository;
use App\Repositories\OrderRepository\OrderRepositoryInterface;
use App\Repositories\ProductRepository\MysqlProductRepository;
use App\Repositories\ProductRepository\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the repository services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ProductRepositoryInterface::class, MysqlProductRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, MysqlOrderRepository::class);
    }
}
