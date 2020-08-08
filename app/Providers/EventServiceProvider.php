<?php

namespace App\Providers;

use App\Events\CreateProductEvent;
use App\Events\ProductOrderEvent;
use App\Events\UpdateProductEvent;
use App\Listeners\CreateProductListener;
use App\Listeners\ProductOrderListener;
use App\Listeners\UpdateProductListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CreateProductEvent::class => [
            CreateProductListener::class,
        ],
        UpdateProductEvent::class => [
            UpdateProductListener::class,
        ],
        ProductOrderEvent::class => [
            ProductOrderListener::class,
        ],
    ];
}
