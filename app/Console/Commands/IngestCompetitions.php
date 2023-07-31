<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use App\Models\League;
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
        $response = Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get('https://api.football-data.org/v4/competitions');
        $data = $response->json();
        $leagues = $data['competitions'];



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

    }
}
