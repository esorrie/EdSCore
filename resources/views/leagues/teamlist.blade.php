@extends('layouts.base')

@section('content')

<x-leaguecomponents.overview :league="$league"/>


<div class="mb-4 bg-gradient-to-b from-fadegrey to-black border rounded-b-lg flexcenter h-14 pl-14">
  <div class="pr-5 grey hover:font-bold"> 
    <a class="{{ request()->routeIs('leagues.view') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}"> OVERVIEW </a> 
  </div>
  <div class="pr-5 grey hover:font-bold"> 
    <a class="{{ request()->routeIs('leagues.standings') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/standings">STANDINGS</a> 
  </div>
  <div class="pr-5 grey hover:font-bold"> 
    <a class="{{ request()->routeIs('leagues.fixtures') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/fixtures">FIXTURES</a> 
  </div>
  <div class="pr-5 grey hover:font-bold"> 
    <a class="{{ request()->routeIs('leagues.teams') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/teams">TEAMS</a> 
  </div>
</div>

<x-leaguecomponents.teamslist :teams="$teams" />

<a href="/leagues">Go Back to leagues</a>

@endsection 