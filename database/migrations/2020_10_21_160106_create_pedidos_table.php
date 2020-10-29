<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('code');
            $table->date('orderDate');
            $table->longText('observations')->nullable();
            $table->boolean('fromApp');
            $table->string('deliveryPointId');
            $table->string('statusOrderId');
            $table->string('name');
            $table->string('address');
            $table->string('phoneNumber');
            $table->json('orderProducts');

            $table->string('status');


            $table->unsignedBigInteger('tienda_id')->nullable();
            $table->foreign('tienda_id')
                ->references('id')
                ->on('tiendas')
                ->onDelete('cascade');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
