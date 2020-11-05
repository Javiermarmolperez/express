<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => 'user',
            'email' => 'lucyarce722@gmail.com',
            'email_verified_at' => now(),
            'password' => 'Dylan123', // password
            'remember_token' => Str::random(10),
        ];
    }
}
