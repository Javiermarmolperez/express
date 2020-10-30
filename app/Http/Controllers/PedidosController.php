<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

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

            $allProducts = $pedido->orderProducts;
            $item = json_decode($allProducts);

            array_push($arrayPedidos,[$status,$item]);

        }



        return view('pedidos.index',compact('pedidos','arrayPedidos'));
    }

    public function show($id)
    {

            $pedidos=Pedidos::find($id);
            $allOrdersProducts = json_decode($pedidos->orderProducts);
            $code = json_decode($pedidos->code);

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



        return view('pedidos.details',compact('allOrdersProducts','arrayProducts','code','product','item','measure'));

    }

    public function update(Request $request, $id)
    {

        $status = $this->validate($request,['name'=>'required']);
        $json = $status['name'];

        $shark = Pedidos::find($id);
        $shark->status = $json;
        $shark->save();
        //dd($shark->status);

        //DB::table('pedidos')->where('status')->update($status);


        return redirect()->route('pedidos.index')->with('success','Registro actualizado satisfactoriamente');

    }
}
