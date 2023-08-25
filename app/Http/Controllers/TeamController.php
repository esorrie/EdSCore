<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    // This method fetches all teams from the database and returns them paginated to the 'teams.index' view
    public function index(): View 
    {
        $search = request()->query('name');

        if ($search) {
            $team = Team::where('name', 'LIKE', "%{$search}%")->orderBy('name')->simplePaginate(10);
            // dd($team);
        } else {
            $team = Team::orderBy('name')->simplePaginate(10);
            
        }

        return view('teams.index', [
            'teams' => $team,
        ]);
    }

    // This method fetches a specific team by ID and displays its information in the 'teams.view' view
    public function view(int $id, string $slug): RedirectResponse|View
    {

        $team = Team::where('id', $id)->first(); //with('manager')->
        $player = $team->players;

        if(! $team) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($team->slug !== $slug) {
            return redirect()->route('teams.view', [
                'id' => $team->id,
                'slug' => $team->slug,
            ]);
        }

        // Prepare team data for displaying in a table format
        $teamArray = $team->toArray();
        // Define the keys for the table data
        $tableDataKeys = ['manager', 'stadium', 'location', 'founded'];

        // Prepare table data for the team's general information.
        foreach($tableDataKeys as $key) {
            $teamTableData[] = [
                Str::replace('.name', '', [
                    'data' => $key,
                    'style' => 'uppercase'
                ]),
                [
                    'data' => data_get($teamArray, $key),
                    'style' => 'text-right uppercase'
                ]
            ];
        }
        // Return the 'teams.view' view with the team information and related data
        return view('teams.view', [
            'league' => League::where('id', $id)->first(),
            'team' => $team,
            'teamTableData' => $teamTableData,
            'players' => $player,
        ]);
    }

    // This method is supposed to show a team's matches, but currently, it fetches all teams and returns them to the 'teams.fixtures' view
    public function fixtures(int $id, string $slug) : RedirectResponse|View
    {
        $team = Team::where('id', $id)->first();

        if(! $team) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($team->slug !== $slug) {
            return redirect()->route('teams.view', [
                'id' => $team->id,
                'slug' => $team->slug,
            ]);
        }

        return view('teams.fixtures', [
            'team' => $team,
        ]);
    }

    // This method is supposed to show a team's matches, but currently, it fetches all teams and returns them to the 'teams.results' view
    public function results(int $id, string $slug) : RedirectResponse|View
    {
        $team = Team::where('id', $id)->first();

        if(! $team) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($team->slug !== $slug) {
            return redirect()->route('teams.view', [
                'id' => $team->id,
                'slug' => $team->slug,
            ]);
        }

        return view('teams.results', [
            'team' => $team,
        ]);
    }
    
    // This method displays a team's players in the 'teams.players' view
    public function players(int $id, string $slug) : RedirectResponse|View
    {
        $team = Team::with('players')->where('id', $id)->first();

        if(! $team) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($team->slug !== $slug) {
            return redirect()->route('teams.view', [
                'id' => $team->id,
                'slug' => $team->slug,
            ]);
        }

        return view('teams.players', [
            'team' => $team,
            'players' => $team->players
        ]);
    }
    
}
