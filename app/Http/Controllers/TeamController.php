<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index(): View 
    {
        return view('teams.index', [
            'teams' => Team::paginate(20),
        ]);
    }

    public function view(int $id, string $slug): RedirectResponse|View
    {
        $team = Team::with('manager')->where('id', $id)->first();
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

        $teamArray = $team->toArray();
        $tableDataKeys = ['manager.name', 'stadium', 'location', 'nickname', 'founded'];

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

        return view('teams.view', [
            'team' => $team,
            'teamTableData' => $teamTableData,
            'teams' => Team::all()->take(5),
            'players' => $player
        ]);
    }

    public function matches(int $id, string $slug) : RedirectResponse|View
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

        return view('teams.matches', [
            'team' => $team,
            'matches' => Team::all(),
        ]);
    }
    
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
