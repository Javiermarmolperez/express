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

        $arrayPedidos = [];
        foreach ($pedidos as $pedido)
        {
            //$id = $pedido->tienda_id;

            $status = $pedido->status;
            $nameStatus = explode('"',$status);
            $name = $nameStatus[5];

            $allProducts = $pedido->orderProducts;
            $item = json_decode($allProducts);

            array_push($arrayPedidos,[$name,$item]);
        }
        foreach ($arrayPedidos as $arrayPedido)
        {
            foreach ($arrayPedido[1] as $pedido)
            {
                $producto = $pedido->product;
                $medida = $pedido->measure;

            }
        }




        return view('pedidos.index',compact('pedidos','name','item'));
    }

    public function get_details($id)
    {

        return view('pedidos.pdf',compact('id'));

    }
}
