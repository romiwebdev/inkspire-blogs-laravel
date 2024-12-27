<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat 2 admin
        User::factory()->count(2)->state(['role' => 'admin'])->create();
        
        // Buat 10 author
        $authors = User::factory()->count(10)->state(['role' => 'author'])->create();

        // Buat 5 kategori
        $categories = Category::factory()->count(5)->create();

        // Buat postingan untuk setiap author
        $authors->each(fn($author) => Post::factory()->count(10)->create([
            'author_id' => $author->id,
            'category_id' => $categories->random()->id,
        ]));

        // Panggil seeder tambahan
        $this->call([
            PostSeeder::class,
            VisitSeeder::class,
        ]);
    }
}
