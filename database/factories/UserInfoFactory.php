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
            'user_id' => \App\Models\User::factory(), // ✅ create user on the fly
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'gender'     => $this->faker->randomElement(['male', 'female']),
            'address'    => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'contact_num'=> $this->faker->phoneNumber(),
        ];

    }
}
