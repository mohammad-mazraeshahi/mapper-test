<?php

namespace App\Listeners;

use App\Events\CreateProductEvent;
use App\Repositories\ProductRepository\ProductRepositoryInterface;
use Illuminate\Support\Facades\Log;

class CreateProductListener
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
     * @param CreateProductEvent $event
     * @return void
     */
    public function handle(CreateProductEvent $event)
    {
        $product = $this->productRepository->updateOrCreate($event->product);
        Log::info('Product Created', $product->toArray());
    }
}
