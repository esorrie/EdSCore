@extends('layouts.base')

@section('content')

<div class="leagueoverview">
  <div class="leaguecard">
    <div class="leaguename"> {!! $team->name !!}</div>
    <div class="leaguenation"> <span class="orange"> LOCATION </span> <span class="grey"> | </span> {!! $team->totalPlayers !!} PLAYERS </div>
  </div>
</div>

<div class="mb-4 bg-gradient-to-b from-fadegrey to-black border rounded-b-lg flexcenter h-14 pl-14">
  <div class="pr-5 grey hover:font-bold"> 
    <a class="{{ request()->routeIs('teams.view') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}"> OVERVIEW </a> 
  </div>
  <div class="pr-5 grey hover:font-bold"> 
    <a class="{{ request()->routeIs('teams.matches') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/matches"> MATCHES</a> 
  </div>
  <div class="pr-5 grey hover:font-bold"> 
    <a class="{{ request()->routeIs('teams.players') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/players"> PLAYERS</a> 
  </div>
</div>

<div class="grid grid-cols-2">
  <div class="details">
    <div class="bordertop bg-darkgrey smallpadding text "> TEAM DETAILS</div>
      <div class="grid grid-cols-2 grid-rows-4 details">
        <div class="border text-sm text smallpadding"> MANAGER</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {!! $team->manager->name !!}</div>
        <div class="border text-sm text smallpadding"> STADIUM</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {!! $team->stadium !!}</div>
        <div class="border text-sm text smallpadding"> LOCATION</div>
        <div class="border text-sm text smallpadding uppercase text-right"> #</div>
        <div class="border text-sm text smallpadding"> NICKNAME</div>
        <div class="border text-sm text smallpadding uppercase text-right"> #</div>
      </div>
  </div>
  <div class=""><x-fixturepreview /></div>
</div>
<div class="text-xs text"><a href="/teams">Go Back to teams</a></div>

@endsection