<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Review;
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

        $user1 = User::factory()->create([
            'email' => 'binverwin16@gmail.com',
            'is_admin' => 1,
        ]);

        UserInfo::factory()->create([
            'user_id' => $user1->id,
            'first_name' => 'Benhur',
            'last_name'  => 'Verwin',
            'gender'     => 'Male',
            'address'    => 'Rizal',
            'birth_date' => '2001-10-16',
            'contact_num'=> '09774223122',
        ]);

        $user2 = User::factory()->create([
            'email' => 'john@test.com',
            'is_admin' => 0,
        ]);

        UserInfo::factory()->create([
            'user_id' => $user2->id,
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'gender'     => 'Male',
            'address'    => 'United States',
            'birth_date' => '2000-10-16',
            'contact_num'=> '09774223122',
        ]);
        
        $this->call(ProductSeeder::class);

        Review::factory(10)->create();
    }
}
