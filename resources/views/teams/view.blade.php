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

<div class="flex justify-evenly">
  <div class="grid grid-cols-2">
    <div class="details">
      <x-card.card title="Team Details">
        <x-table.table :tableData="$teamTableData"/>
      </x-card.card>
    </div>
  </div>
  <div class="w-full text-white">
    <x-leaguecomponents.fixturepreview />
  </div>
</div>
<div class="flex justify-evenly">
  <div class="grid grid-cols-2">
    <div class="details">
    <x-table.leaguetablepreview :teams="$teams"/>
    </div>
    
    <div class="w-full">
      <div class="margintop text">
        <div class="bordertop bg-darkgrey smallpadding  ">GAME STATS</div>
          <div class="grid grid-cols-13 text-xs">
            <div class="border bg-darkgrey smallpadding col-span-2"> DATE </div>
            <div class="border bg-darkgrey smallpadding col-span-2"> OPP </div>
            <div class="border bg-darkgrey smallpadding"> RESULT </div>
            <div class="border bg-darkgrey smallpadding"> G </div>
            <div class="border bg-darkgrey smallpadding"> CONC </div>
            <div class="border bg-darkgrey smallpadding"> S </div>
            <div class="border bg-darkgrey smallpadding"> SoT </div>
            <div class="border bg-darkgrey smallpadding"> xG </div>
            <div class="border bg-darkgrey smallpadding"> xA </div>
            <div class="border bg-darkgrey smallpadding"> xGA </div>
            <div class="border bg-darkgrey smallpadding"> xAA </div>
            <div class="border smallpadding col-span-2"> 26/07/23</div>
            <div class="border smallpadding col-span-2"> sunderland</div>
            <div class="border smallpadding"> 12-0 </div>
            <div class="border smallpadding"> 3</div>
            <div class="border smallpadding"> 2</div>
            <div class="border smallpadding"> 23</div>
            <div class="border smallpadding"> 5</div>
            <div class="border smallpadding"> 2.4</div>
            <div class="border smallpadding"> 1.1</div>
            <div class="border smallpadding"> 0.6</div>
            <div class="border smallpadding"> 0.7</div>
          </div>
      </div> 
    </div>
  </div>
</div>
  

<div class="text-xs text"><a href="/teams">Go Back to teams</a></div>

@endsection