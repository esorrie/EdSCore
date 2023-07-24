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

<div class="grid grid-cols-3">
  <div class="bg-darkgrey border rounded-tl-lg smallpadding">
      <div class="text"> NAME</div>
  </div>
  <div class="bg-darkgrey border smallpadding">
      <div class="text"> DATE OF BIRTH</div>
  </div>
  <div class="bg-darkgrey border rounded-tr-lg smallpadding">
    <div class="text"> POSITION</div>
  </div>
  {{-- TODO --}}
  {{-- displaying the team name instead of player but url redirect works correctly based on id--}}
    @foreach ($players as $player)
      <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
        <a href="/players/{{ $player->id }}/{{ $player->slug }}">
          {{ $player->name }}
        </a>
      </div>
      <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
        {{ $player->date_of_birth}}
      </div>
      <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
        {{ $player->position}}
      </div>
  @endforeach
</div>

@endsection