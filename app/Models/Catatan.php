<?php 
namespace App\Models; use Illuminate\Database\Eloquent\Model; 

class Catatan extends Model
{
    protected $table = 'catatan';
    protected $primaryKey = 'id_catatan';
    public $timestamps = false;

    protected $fillable = ['catatan']; // Add any other fields that are fillable
}