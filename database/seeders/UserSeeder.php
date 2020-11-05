<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'lucyarce722@gmail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('Dylan123');
        $user->remember_token =  Str::random(10);


        $user->save();
    }
}
