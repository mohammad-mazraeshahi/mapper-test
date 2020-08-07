<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResourceCollection;
use App\Repositories\ProductRepository\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Index all products
     *
     * @method GET
     * @return ProductResourceCollection
     */
    public function index()
    {
        return new ProductResourceCollection($this->productRepository->all());
    }
}
