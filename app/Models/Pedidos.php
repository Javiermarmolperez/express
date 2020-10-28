<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'orderDate'];

    protected function tiendas()
    {
        return $this->belongsTo(Tienda::class);
    }
}
