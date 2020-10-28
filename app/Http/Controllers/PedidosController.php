<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Tienda;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    protected function index()
    {
        $pedidos = Pedidos::all();
        foreach ($pedidos as $pedido) {
            $id = $pedido->tienda_id;
        }

        $tienda = Tienda::find($id);



        return view('pedidos.index',compact('pedidos','tienda'));
    }
}
