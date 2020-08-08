<?php


namespace App\Repositories\OrderRepository;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MysqlOrderRepository implements OrderRepositoryInterface
{

    /**
     * @param Order $order
     * @return Order
     */
    public function create(Order $order)
    {
        $order->setUpdatedAt(Carbon::now()->toString());
        $order->setCreatedAt(Carbon::now()->toString());
        $order->id = DB::table('orders')->insertGetId($order->attributesToArray());
        return $order;
    }
}
