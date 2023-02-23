<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\OpportunityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
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
            'name'        => fake()->sentence(rand(1, 5)),
            'salary'      => fake()->randomFloat(2, 700, 10000),
            'description' => fake()->paragraph(rand(1,5)),
            'city_id'     => $city->id,
            'state_id'    => $state_id,
            'company_id'  => Company::factory(),
            'opportunities_type_id' => OpportunityType::inRandomOrder()->first()->id
        ];
    }
}
