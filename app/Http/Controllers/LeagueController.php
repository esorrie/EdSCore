<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class LeagueController extends Controller
{
    public function index(): View 
    {
        $league = League::all();
    
        return view('leagues.index', [
            'leagues' => League::all(),
        ]);
    }

    public function view(int $id, string $slug): RedirectResponse|View
    {
        $league = League::where('id', $id)->first();
        $team = $league->teams;

        if(! $league) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($league->slug !== $slug) {
            return redirect()->route('leagues.view', [
                'id' => $league->id,
                'slug' => $league->slug,
            ]);
        }
    
        return view('leagues.view', [
            'league' => $league,
            'teams' => $team
        ]);
    }

    public function standings(int $id, string $slug): RedirectResponse|View 
    {
        $league = League::where('id', $id)->first();
        $team = Team::where('id', $id)->first();
        
        if(! $league) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($league->slug !== $slug) {
            return redirect()->route('leagues.view', [
                'id' => $league->id,
                'slug' => $league->slug,
            ]);
        }

        return view('leagues.standings', [
            'league' => $league,
            'teams' => Team::all()->where('league_id', $league->id)
            
        ]);
    }

    public function fixtures(int $id, string $slug): RedirectResponse|View 
    {
        $league = League::where('id', $id)->first();

        if(! $league) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($league->slug !== $slug) {
            return redirect()->route('leagues.view', [
                'id' => $league->id,
                'slug' => $league->slug,
            ]);
        }

        return view('leagues.fixtures', [
            'league' => $league,
            'fixtures' => League::all(),
        ]);
    }
    
    public function teams(int $id, string $slug): RedirectResponse|View 
    {
        $league = League::where('id', $id)->first();
        $team = Team::all();

        if(! $league) {
            abort(Response::HTTP_NOT_FOUND);
        }

        if($league->slug !== $slug) {
            return redirect()->route('leagues.view', [
                'id' => $league->id,
                'slug' => $league->slug,
            ]);
        }

        return view('leagues.teamlist', [
            'league' => $league,
            'teams' => Team::all()->where('league_id', $league->id)
        ]);
    }

    
}
