<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\League;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;


class LeagueController extends Controller
{
    // Display the list of all leagues
    public function index(): View 
    {
        $search = request()->query('name');

        if ($search) {
            $league = League::where('name', 'LIKE', "%{$search}%")->orderBy('name')->simplePaginate(10);
        } else {
            $league = League::orderBy('name')->simplePaginate(10);
        }

        return view('leagues.index', [
            'leagues' => $league,
        ]);
    }

    // View a specific league with its associated teams
    public function view(int $id, string $slug): RedirectResponse|View
    {
        $league = League::where('id', $id)->first(); // Fetch the league with the given ID
        $team = $league->teams; // Fetch all the teams associated with this league
        $fixture = $league->fixtures->where('full_time_home', null)->first();

        // If the league is not found, return a 404 error
        if(! $league) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        // If the provided slug does not match the league's actual slug, redirect to the correct URL
        if($league->slug !== $slug) {
            return redirect()->route('leagues.view', [
                'id' => $league->id,
                'slug' => $league->slug,
            ]);
        }
    
        // Pass the league and its associated teams to the 'leagues.view' view
        return view('leagues.view', [
            'league' => $league,
            'teams' => $team,
            'fixture' => $fixture,
        ]);
    }

    // View the standings of a specific league with its associated teams
    public function standings(int $id, string $slug): RedirectResponse|View 
    {
        $league = League::where('id', $id)->first(); // Fetch the league with the given ID
        
        if(! $league) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($league->slug !== $slug) {
            return redirect()->route('leagues.view', [
                'id' => $league->id,
                'slug' => $league->slug,
                'teams' => $league->teams
            ]);
        }

        // Pass the league, its associated teams, and the sorted standings table to the 'leagues.standings' view
        return view('leagues.standings', [
            'league' => $league,
            'teams' => $league->teams, 
        ]);
        
    }

    // View the fixtures of a specific league
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

        $fixtures = $league->fixtures()
        ->where('full_time_home', null)
        ->simplePaginate(10)
        ;

        // Pass the league and all fixtures to the 'leagues.fixtures' view
        return view('leagues.fixtures', [
            'league' => $league,
            'fixtures' => $fixtures // only fixtures associated with the league through league_id will be displayed
        ]);
    }

    public function results(int $id, string $slug): RedirectResponse|View 
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

        $results = $league->fixtures()
        ->where('full_time_home', '!=', null)
        ->orderBy('id', 'desc')
        ->simplePaginate(10)
        ;
        
        
        // Pass the league and all results to the 'leagues.results' view
        return view('leagues.results', [
            'league' => $league,
            'results' => $results
        ]);
    }
    
    public function teams(int $id, string $slug): RedirectResponse|View 
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

        return view('leagues.teamlist', [
            'league' => $league,
            'teams' => $league->teams->sortBy('name')
        ]);
    }

    
}
