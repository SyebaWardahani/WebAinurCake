<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CakeShopOrdersDetail extends Model
{
    protected $table = 'cake_shop_orders_detail';

    public static function getTotalJumlahByOrderId($orderId)
    {
        return self::where('orders_id', $orderId)->sum('quantity');
    }
}