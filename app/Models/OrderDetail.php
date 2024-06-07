<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'cake_shop_orders_detail';
    protected $fillable = ['orders_detail_id'];

    /**
     * Menghitung total transaksi dari order details.
     *
     * @return float
     */
    public static function total_transaksi()
    {
        return self::sum('total_transaksi'); // Menghitung total transaksi dari kolom 'total'
    }
}
