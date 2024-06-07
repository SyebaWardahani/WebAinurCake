<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CakeShopUsersRegistrations extends Model
{
    protected $table = 'cake_shop_users_registrations';
    protected $primaryKey = 'users_id'; // Menyatakan bahwa primary key adalah 'users_id'
}