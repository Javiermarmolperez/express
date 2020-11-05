<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;


class FtpController extends Controller
{

    function index()
    {
        //recoge los links del ftp carpeta orders
        $arrayAllOrders = Storage::disk('sftp')->files('orders');
        if(!$arrayAllOrders) {
            return \response('please provide valid path', 400);
        }

        //recorre el array de links y devuelve los links individualmente por string
         $this->show($arrayAllOrders);
        return redirect()->route('pedidos.index')->with('success','Registro actualizado satisfactoriamente');

    }


    public function show($file)
    {
        foreach ($file as $stringOrder)
        {
            $contentOrder = Storage::disk('sftp')->get((string)$stringOrder);
            $contentOrderJson = json_decode($contentOrder);
            $arrayOrder = $contentOrderJson->orders;
            $this->save_on_database($arrayOrder);
        }
    }

    public function save_on_database($arrayOrder)
    {
        foreach ($arrayOrder as $order)
        {

            $id = $order->id;
            $code = $order->code;
            $orderDate = $order->orderDate;
            $observations = $order->observations;
            $fromApp = $order->fromApp;
            $statusOrderId = $order->statusOrderId;
            $deliveryPointId = $order->deliveryPointId;
            $name = $order->name;
            $address = $order->address;
            $phoneNumber = $order->phoneNumber;
            $orderProducts = json_encode($order->orderProducts);
            $status = $order->status->name;

            $readtable = DB::table('pedidos')->select('id')->where('id','=',$id)->get();
            $toArray = $readtable->pluck('id');
            $key = $toArray->get(0);

            if ($key !== $id)
                {
                    DB::table('pedidos')->insert([
                        'id'=>$id,
                        'code'=>$code,
                        'orderDate'=>$orderDate,
                        'observations'=>$observations,
                        'fromApp'=>$fromApp,
                        'statusOrderId'=>$statusOrderId,
                        'deliveryPointId'=>$deliveryPointId,
                        'name'=>$name,
                        'address'=>$address,
                        'phoneNumber'=>$phoneNumber,
                        'orderProducts'=>$orderProducts,
                        'status'=>$status
                    ]);
                }
        }
        return 'pedido ya guardado';


    }




}
