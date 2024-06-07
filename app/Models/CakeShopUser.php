<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CakeShopUser extends Model
{
    protected $table = 'cake_shop_users_registrations';
    protected $fillable = ['users_username'];
}