<?php

namespace App\Events;

use App\Models\Product;

class CreateProductEvent extends Event
{
//    use Dispatchable;

    public $product;

    /**
     * Create a new event instance.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
