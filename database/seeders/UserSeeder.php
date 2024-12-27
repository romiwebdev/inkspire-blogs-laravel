<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat user Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'adminpassword', // Password disimpan langsung, tanpa hashing
            'role' => 'admin', // Pastikan Anda sudah menambahkan kolom role pada tabel users
        ]);

        // Membuat user Author
        User::create([
            'name' => 'Author User',
            'email' => 'author@example.com',
            'password' => 'authorpassword', // Password disimpan langsung, tanpa hashing
            'role' => 'author', // Pastikan Anda sudah menambahkan kolom role pada tabel users
        ]);
    }
}
