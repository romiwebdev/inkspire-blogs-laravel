<?php

namespace Database\Factories;

use App\Models\User; // Tambahkan namespace model
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class; // Hubungkan dengan model User

    public function definition()
{
    return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'password' => 'password', // Default password tanpa hashing
        'role' => $this->faker->randomElement(['author', 'admin']), // Random role
    ];
}

}
