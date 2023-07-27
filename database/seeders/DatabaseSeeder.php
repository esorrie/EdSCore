<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\League;
use App\Models\Manager;
use App\Models\Team;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        League::truncate();
        Team::truncate();
        Player::truncate();
        Manager::truncate();
        User::truncate();

        League::factory(2)->create([])->each(function( $league ) {
            Team::factory(20)->create([
                'league_id' => $league->id
            ])->each(function( $team ) {
                Player::factory(3)->create([
                    'team_id' => $team->id,
                    'position' => 'goalkeeper'
                ]);
                Player::factory(rand(3, 8))->create([
                    'team_id' => $team->id,
                    'position' => 'defender'
                ]);
                Player::factory(rand(5, 10))->create([
                    'team_id' => $team->id,
                    'position' => 'midfielder'
                ]);
                Player::factory(rand(2,4))->create([
                    'team_id' => $team->id,
                    'position' => 'striker'
                ]);
                Player::factory(5)->create([
                    'team_id' => $team->id
                ]);
                Manager::factory(1)->create([
                    'team_id' => $team->id
                ]);
                
            });
        });
        User::factory(10)->create();
    }
}
