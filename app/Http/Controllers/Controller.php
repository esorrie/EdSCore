<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\League;
use App\Models\Team;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function test() {
        
        // $team = Team::find(1044);
        // dd($team->league()->where('id', '2021'))->get();

        // $league = League::all();
        // $fixture = $league->fixtures->where('full_time_home', null)->first();
        // dd($fixture);
        
        $response = Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get('https://api.football-data.org/v4/teams/67/matches');
        dd($response->json());
    }

    public function home() {

        $fixture = Fixture::all()->where('full_time_home', null)->first();

        return view('home', [
            'fixture' => $fixture,
        ]);
    }

}
