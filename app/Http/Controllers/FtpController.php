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
        $arrayAllOrders = Storage::disk('sftp')->files('orders');
        if(!$arrayAllOrders) {
            return \response('please provide valid path', 400);
        }
        return view('ftp.index',compact('arrayAllOrders'));
    }


    public function show($file)
    {
        foreach ($file as $stringOrder)
        {
            $stringOrder;
        }
        $contentOrder = Storage::disk('sftp')->get((string)$stringOrder);
        $contentOrderJson = json_decode($contentOrder);
        $arrayOrder = $contentOrderJson->orders;

        $this->save_on_database($arrayOrder);

        return view('ftp.pdf',compact('arrayOrder'));

    }

    public function save_on_database($arrayOrder)
    {
        foreach ($arrayOrder as $order) {

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
            $status = json_encode($order->status);
        }
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

    public function upload()
    {
        //recoge los links del ftp carpeta orders
        $arrayAllOrders = Storage::disk('sftp')->files('orders');
        if(!$arrayAllOrders) {
            return \response('please provide valid path', 400);
        }
        //recorre el array de links y devuelve los links individualmente por string
        foreach ($arrayAllOrders as $stringOrder)
        {
            $stringOrder;
        }
        //recoge el archivo del link individual de la orden
        $contentOrder = Storage::disk('sftp')->get((string)$stringOrder);
        //transforma el contenido y guarda en un array ($arrayOrder)
        $contentOrderJson = json_decode($contentOrder);
        $arrayOrder = $contentOrderJson->orders;
        //recorre el array del pedido y guarda en variables los datos
        foreach ($arrayOrder as $order) {

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
            $status = json_encode($order->status);
        }
        //inserta los valores en los campos correspondientes en la tabla pedidos
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

        return 'subido';

    }


}
