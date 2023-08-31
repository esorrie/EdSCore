<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\League;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home() {
        // allows for the fixtures of leagues to be used on the home page
        
        $table = null;
        $teams = Team::all();
        $league = League::all();

        dd($league);
        foreach($teams as $team) {
            // Calculate additional statistics for each team (points and played games)
            $table[] = [
                'name' => ($team['name']),
                
                'points' => ($team['pivot']['won'] * 3 + $team['pivot']['drawn']),
                // 'gd' => ($team['pivot']['gd']),
                // 'gf' => ($team['pivot']['gf']),
            ];
            
            $topTeams = collect($table)->sortBy([
                ['points', 'desc'],
                ['gd', 'desc'],
                ['gf', 'desc'],
            ]);
            
            // dd($topTeams);
        }





        return view('home', [
            'fixture' => Fixture::all()->where('full_time_home', null)->first(),
            // 'teams' => Team::all()->sortBy([['points', 'desc'], ['gd', 'desc']]),
            'topTeams' => $topTeams,
        ]);
    }



}