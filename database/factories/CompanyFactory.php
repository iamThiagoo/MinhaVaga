<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'name'     => fake()->company(),
            'email'    => fake()->companyEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'    => fake()->phoneNumber(),
            'slug'     => fake()->slug(),
            'cnpj_cpf' => fake()->cnpj(),
            'bio'      => fake()->paragraph(rand(0, 4)),
            'city_id'  => $city->id,
            'state_id' => $state_id
        ];
    }
}
