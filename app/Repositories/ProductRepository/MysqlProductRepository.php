<?php


namespace App\Repositories\ProductRepository;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MysqlProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return DB::table('products')->get();
    }

    /**
     * @param string $uuid
     * @return Product
     */
    public function getByUuid($uuid)
    {
        return (new Product((array)DB::table('products')->where('uuid', $uuid)->first()));
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function updateOrCreate(Product $product)
    {
        $productInDatabase = $this->CheckExist($product);

        if ($productInDatabase) {
            $product->id = $productInDatabase->id;
            $product = $this->update($product);
        } else {
            $product = $this->create($product);
        }

        return $product;
    }


    /**
     * @param Product $product
     * @return Product
     */
    public function create(Product $product)
    {
        $product->setCreatedAt(Carbon::now()->toString());
        $product->setUpdatedAt(Carbon::now()->toString());
        $product->id = DB::table('products')->insertGetId($product->attributesToArray());
        return $product;
    }

    /**
     * @param Product $product
     * @return Model|null
     */
    public function CheckExist(Product $product)
    {
        return DB::table('products')->where('uuid', $product->uuid)->first();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function update(Product $product)
    {
        $product->setUpdatedAt(Carbon::now()->toString());
        DB::table('products')
            ->where('uuid', $product->uuid)
            ->update($product->toArray());

        return $product;
    }
}
