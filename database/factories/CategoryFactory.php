<?php

namespace Database\Factories;

use App\Models\Category; // Tambahkan namespace model
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class; // Hubungkan dengan model Category

    public function definition()
    {
        return [
            'name' => $this->faker->word, // Nama kategori acak
        ];
    }
}
