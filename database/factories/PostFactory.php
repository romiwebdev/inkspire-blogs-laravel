<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => collect($this->faker->paragraphs(10))
                ->chunk(3) // Membagi paragraf menjadi kelompok 3
                ->map(fn($chunk) => implode("\n\n", $chunk->toArray())) // Ubah chunk ke array dan gabungkan paragraf
                ->implode("\n\n"), // Gabungkan grup paragraf dengan dua baris kosong
            'author_id' => User::inRandomOrder()->first()->id, // Ambil author yang sudah ada
            'category_id' => Category::inRandomOrder()->first()->id, // Ambil kategori yang sudah ada
            'views' => rand(1, 10), // Random antara 1 dan 10
        ];
        
    }
}
