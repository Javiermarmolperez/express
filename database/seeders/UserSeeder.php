<?php

namespace Database\Seeders;

use App\Models\Tienda;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::factory()
            ->times(5)
            ->create()->each(function ($user) {
                // Seed the relation with one name
                $name = Tienda::factory()->make();
                $user->tienda()->save($name);
            });
    }
}
