<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            /*$table->integer('pedido_id');*/
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tiendas');
    }
}
