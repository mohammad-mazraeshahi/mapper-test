<?php

namespace App\Listeners;

use App\Events\ProductOrderEvent;
use App\Models\Order;
use App\Repositories\OrderRepository\OrderRepositoryInterface;
use App\Repositories\ProductRepository\ProductRepositoryInterface;
use Illuminate\Support\Facades\Log;

class ProductOrderListener
{
    private $productRepository;
    private $orderRepository;

    /**
     * Create the event listener.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Handle the event.
     *
     * @param ProductOrderEvent $event
     * @return void
     */
    public function handle(ProductOrderEvent $event)
    {
        $product = $this->productRepository->getbyUuid($event->product->uuid);
        $product->stock--;
        $this->productRepository->update($product);

        $order = $this->orderRepository->create(new Order([
            'product_id' => $product->id,
            'count' => 1
        ]));

        Log::info('Order Product', [$product->toArray(), $order->toArray()]);
    }
}
