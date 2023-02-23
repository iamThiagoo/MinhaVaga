<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $city = City::inRandomOrder()->first();
        $state_id = $city->state_id;

        return [
            'name'  => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'bio'   => fake()->paragraph(rand(0, 4)),
            'cpf'   => fake()->cpf(),
            'phone'    => fake()->cellphoneNumber(),
            'slug'     => fake()->slug(),
            'birthday' => fake()->date('Y_m_d'),
            'city_id'  => $city->id,
            'state_id' => $state_id,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ];
    }
}
