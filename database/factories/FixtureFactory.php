<?php

namespace Database\Factories;

use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fixture>
 */
class FixtureFactory extends Factory
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
            'league_id' => League::factory(),
            'date' => fake()->format('d/m/Y', 'H:i'),
            'match_id' => fake()->string(),
            'home_team_id' => fake()->name(),
            'away_team_id' => fake()->name(),
            'home_team_slug' => Str::slug($name),
            'away_team_slug' => Str::slug($name),
            'home_team' => $name,
            'away_team' => $name,
            'home_team_crest'=> fake()->string(),
            'away_team_crest'=> fake()->string(),
            'half_time_home' => fake()->randomElement(['0','1','2','3'])->format('-'),
            'half_time_away' => fake()->randomElement(['0','1','2','3'])->format('-'),
            'full_time_home' => fake()->randomElement(['0','1','2','3'])->format('-'),
            'full_time_away' => fake()->randomElement(['0','1','2','3'])->format('-'),
            'referee' => fake()->name(),
        ];
    }
}
