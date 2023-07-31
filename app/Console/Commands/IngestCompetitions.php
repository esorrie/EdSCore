<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Team;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class IngestCompetitions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ingest-competitions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // GET COMPETITIONS
        $responseLeagues = Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get('https://api.football-data.org/v4/competitions');
        $dataLeagues = $responseLeagues->json();
        $leagues = $dataLeagues['competitions'];

        $responseTeams = Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get('https://api.football-data.org/v4/competitions/PL/teams');
        $dataTeams = $responseTeams->json();
        $teams = $dataTeams['teams'];

        // FORMAT THE DATA INTO AN EXPECTED FORMAT FOR US TO USE IN LARAVEL
        // LOOP THOUGH DATA AND WRITE IT TO OUR DB
        foreach($leagues as $league) {
            $slug = Str::slug($league['name'], '-');
            League::create([
                'id' => $league['id'],
                'name' => $league['name'],
                'emblem' => $league['emblem'],
                'location' => $league['area']['name'],
                'slug' => $slug,
            ]);
        }

        foreach($teams as $team){
            $slug = Str::slug($team['name'], '-');
            Team::create([
                'league_id' => $team['runningCompetitions']['0']['id'],
                'id' => $team['id'],
                'slug' => $slug,
                'name' => $team['name'],
                'crest' => $team['crest'],
                'stadium' => $team['venue'],
                'founded' => $team['founded'],
                'location' => $team['area']['name'],
                'manager' => $team['coach']['name'], // get manager name from an manager api call not team
            ]);
        }
    }
}
