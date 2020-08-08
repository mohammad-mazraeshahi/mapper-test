<?php

namespace App\Events;

use App\Models\Order;
use App\Models\Product;

class ProductOrderEvent extends Event
{
//    use Dispatchable;

    public $order;
    public $product;

    /**
     * Create a new event instance.
     *
     * @param Product $product
     * @param Order $order
     */
    public function __construct(Product $product, ?Order $order = null)
    {
        $this->order = $order;
        $this->product = $product;
    }
}
