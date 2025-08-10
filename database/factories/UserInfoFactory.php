<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'first_name' => 'Benhur',
            'last_name' => 'Verwin',
            'gender' => 'male',
            'address' => 'Rizal',
            'birth_date' => '2000-10-16',
            'contact_num' => '09774993841'
        ];
    }
}
