<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PedidosSeeder::class);
       // $this->call(TiendaTableSeeder::class);




    }
}
