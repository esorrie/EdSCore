@extends('layouts.base')

@section('content')

<div class="leagueoverview">
  <div class="leaguecard">
    <div class="leaguename"> {!! $league->name !!}</div>
      <div class="leaguenation"> <span class="orange"> LOCATION </span> <span class="grey"> | </span> {!! $league->totalTeams !!} CLUBS </div>
  </div>
</div>

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


<div class="grid grid-cols-3">
    <div class="bg-darkgrey border rounded-tl-lg smallpadding">
        <div class="text"> TEAM</div>
    </div>
    <div class="bg-darkgrey border smallpadding">
        <div class="text">STADIUM</div>
    </div>
    <div class="bg-darkgrey border rounded-tr-lg smallpadding">
      <div class="text">CAPACITY</div>
    </div>
    {{-- TODO --}}
    {{-- displaying the league name instead of team but url redirect works correctly based on id--}}
      @foreach ($teams as $team)
        <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
          <a href="/teams/{{ $team->id }}/{{ $team->slug }}">
            {{ $team }}
          </a>
        </div>
        <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
          
        </div>
        <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
        </div>
    @endforeach
</div>

<a href="/leagues">Go Back to leagues</a>

@endsection 