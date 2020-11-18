<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
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

            foreach ($allOrdersProducts as $pedido)
            {
                $quantity = $pedido->quantity;
                $producto = $pedido->product;
                $medida = $pedido->measure;

                array_push($arrayProducts,[$producto,$medida,$quantity]);
            }



        return view('pedidos.details',compact('pedido','arrayProducts','code'));

    }

    public function update(Request $request, $id)
    {

        /*$status = $this->validate($request,['name'=>'required']);
        $json = $status['name'];
        dd($json);*/

        $pedido = Pedidos::find($id);
        $pedido->status = "Terminado";
        $pedido->save();
        //dd($shark->status);

        //DB::table('pedidos')->where('status')->update($status);


        return redirect()->route('pedidos.index')->with('success','Registro actualizado satisfactoriamente');

    }
}
