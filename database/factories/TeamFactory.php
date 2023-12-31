<?php

namespace Database\Factories;

use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
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
            'slug' => Str::slug($name),
            'name' => $name,
            'crest'=> fake()->name(),
            'founded' => fake() ->year(),
            'stadium' => fake()-> name(),
            'location' => fake()->name(),
            'manager' => fake()->name(),
        ];
    }
}
