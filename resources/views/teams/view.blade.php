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

<div class="flex">
    <div class="details">
      <x-card.card title="Team Details">
        <x-table.table :tableData="$teamTableData"/>
      </x-card.card>
    </div>
    <div class="text-white w-full ml-20">
      <x-card.card title="upcoming fixtures">
          <div class="borderbottom">
              <div class="pt-4 text-xl text-center"> PREMIER LEAGUE </div>
              <div class="padding text uppercase">
                  <div class="text-center text-2xl font-bold"> Newcastle United </div> 
                  <div class="text-center orange font-bold"> vs </div>
                  <div class="text-center text-2xl font-bold"> Manchester United </div>
                  <div class="text-center orange"> 26/07</div>
                  <div class="text-center orange"> 12:30</div>
              </div>    
          </div>  
      </x-card.card>
    </div>
</div>
<div class="flex justify-evenly">

    <div class="details">
      <x-leaguecomponents.leaguetablepreview :teams="$teams" /> {{-- :league="$league" --}}
    </div>
  
    <div class="w-full ml-20">
      <div class="margintop text uppercase">
        <div class="bordertop bg-darkgrey smallpadding  "> game STATS</div>
          <div class="grid grid-cols-13 text-xs">
            <div class="border bg-darkgrey smallpadding col-span-2"> date </div>
            <div class="border bg-darkgrey smallpadding col-span-2"> opp </div>
            <div class="border bg-darkgrey smallpadding"> result </div>
            <div class="border bg-darkgrey smallpadding"> g </div>
            <div class="border bg-darkgrey smallpadding"> conc </div>
            <div class="border bg-darkgrey smallpadding"> s </div>
            <div class="border bg-darkgrey smallpadding"> s </div>
            <div class="border bg-darkgrey smallpadding "> xg </div>
            <div class="border bg-darkgrey smallpadding"> xa </div>
            <div class="border bg-darkgrey smallpadding"> xga </div>
            <div class="border bg-darkgrey smallpadding"> xaa </div>
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
  

<div class="text-xs text"><a href="/teams">Go Back to teams</a></div>

@endsection