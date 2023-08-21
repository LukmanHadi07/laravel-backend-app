<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();
        \App\Models\User::create([
            'name' => 'Lukman Hadi',
            'email' => 'Lukmanhadi2000@gmail.com',
            'email_verified_at' => now(),
            'phone' => '6285784878986',
            'bio' => 'Junior fullstack mobile',
            'role' => 'admin',
            'password' => bcrypt('123456789'),
        ]);
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'email_verified_at' => now(),
            'role' => 'super_admin',
            'password' => bcrypt('123456789'),
        ]);

    }
}
