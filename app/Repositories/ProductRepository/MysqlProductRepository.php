<?php


namespace App\Repositories\ProductRepository;

use Illuminate\Support\Facades\DB;

class MysqlProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return DB::table('products')->get();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function get($query)
    {
        // TODO: Implement get() method.
    }

    public function update($id, $param)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
