<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data menggunakan delete 
        Post::query()->delete();

        // Tambahkan data dummy dengan views random antara 1 hingga 10
        \App\Models\Post::factory()->count(25)->create([
            'views' => fn() => rand(1, 10), // Menggunakan closure untuk nilai acak
        ]);
    }
}
