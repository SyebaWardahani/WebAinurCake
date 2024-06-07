<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    use HasFactory;

    protected $table = 'sumber';

    protected $fillable = ['nama'];

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'id_sumber');
    }
}