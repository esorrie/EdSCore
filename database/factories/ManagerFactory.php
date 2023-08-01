<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'team_id' => Team::factory(),
            'slug' => Str::slug($name),
            'name' => $name,
            // 'nickname' => fake()->firstName(),
            'date_of_birth' => fake()->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'), 
            'contract_start' => fake()->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'), 
            'contract_end' => fake()->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'), 
            'country' => fake()->country(),
            // 'languages_spoken' => fake()->languageCode(),
            // 'seasons' => fake()->numberBetween('1', '30')
        ];
    }
}
