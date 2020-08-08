<?php

namespace App\Listeners;

use App\Events\UpdateProductEvent;
use App\Repositories\ProductRepository\ProductRepositoryInterface;
use Illuminate\Support\Facades\Log;

class UpdateProductListener
{
    private $productRepository;

    /**
     * Create the event listener.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Handle the event.
     *
     * @param UpdateProductEvent $event
     * @return void
     */
    public function handle(UpdateProductEvent $event)
    {
        $product = $this->productRepository->updateOrCreate($event->product);
        Log::info('Product Updated', $product->toArray());
    }
}
