<?php

namespace Database\Seeders;

use App\Models\Pedidos;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{

    public function run()
    {

        $pedido = new Pedidos();
        $pedido->id = '1';
        $pedido->code = '1';
        $pedido->orderDate = '2020-11-01';
        $pedido->observations = 'pedido de ejemplo';
        $pedido->fromApp = '0';
        $pedido->deliveryPointId = '1';
        $pedido->statusOrderId = '1';
        $pedido->name = 'ejemplo';
        $pedido->address = 'ejemplo';


        $pedido->save();

    }
}
