<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /*public function pedidos()
    {
        return $this->hasMany(Pedidos::class);
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }*/

}
