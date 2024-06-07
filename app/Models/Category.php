<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'cake_shop_category'; // Sesuaikan dengan nama tabel yang benar jika diperlukan

    protected $fillable = [
        'category_name',
        // tambahkan field lain yang relevan
    ];
}
