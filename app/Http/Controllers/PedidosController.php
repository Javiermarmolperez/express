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





        return view('pedidos.index',compact('pedidos','name','item'));
    }

    public function show($id)
    {

            $pedidos=Pedidos::find($id);
            $allOrdersProducts = json_decode($pedidos->orderProducts);

            $arrayProducts = [];

            foreach ($allOrdersProducts as $ordersProduct)
            {
                $producto = $ordersProduct->product;
                $medida = $ordersProduct->measure;

                array_push($arrayProducts,[$producto,$medida]);
            }

            foreach ($arrayProducts as $product)
            {
                $item = $product[0];
                $measure = $product[1];
            }



        return view('pedidos.pdf',compact('allOrdersProducts','arrayProducts','product','item','measure'));

    }
}
