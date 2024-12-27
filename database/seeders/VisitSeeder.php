<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;
use Faker\Factory as Faker;

class VisitSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Hapus data lama jika ada
        Visit::truncate();

        // Buat 100 data kunjungan acak
        foreach (range(1, 100) as $index) {
            Visit::create([
                'ip_address' => $faker->ipv4, // IP acak
                'user_agent' => $faker->userAgent, // User Agent acak
                'created_at' => $faker->dateTimeBetween('-1 month', 'now'), // Waktu acak antara sebulan yang lalu hingga sekarang
                'updated_at' => $faker->dateTimeBetween('-1 month', 'now') // Waktu acak antara sebulan yang lalu hingga sekarang
            ]);
        }
    }
}
