@extends('layouts.base')

@section('content')

<x-teamcomponents.overview :team="$team"/>

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


<div class="">
  <x-card.card title="Goalkeepers">
    <x-playercomponents.playerlist :players="$players->where('position', 'goalkeeper')" />
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="Defenders">
    <x-playercomponents.playerlist :players="$players->where('position', 'defender')" />
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="Midfielders">
    <x-playercomponents.playerlist :players="$players->where('position', 'midfielder')" />
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="Attackers">
    <x-playercomponents.playerlist :players="$players->where('position', 'striker')" />
  </x-card.card>
</div>
@endsection