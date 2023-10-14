<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function Laravel\Prompts\select;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'random_number' => fake()->randomNumber(),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'password' => bcrypt('password'),
            'type' => fake()->randomElement(['user','student','teacher']),
            'image' => null,
            'gender' => fake()->randomElement(['male', 'female']),
            't_phone_number' => fake()->phoneNumber,
            's_father' => fake()->name,
            's_mother' => fake()->name,
            's_phone_number' => fake()->phoneNumber,
            's_home_number' => fake()->phoneNumber,
            's_address' => fake()->address,
            'full_name' => function (array $attributes) {
                return $attributes['first_name'] . '_' . $attributes['random_number'];
            },
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
