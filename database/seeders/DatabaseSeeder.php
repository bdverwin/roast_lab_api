<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'binverwin16@gmail.com',
        ]);

        UserInfo::factory()->create();
        
        $this->call(ProductSeeder::class);
    }
}
