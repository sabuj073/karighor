<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Master Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]); 

        // $this->call([
        //     RoleAndPermissionSeeder::class
        //   ]);
    }
}
