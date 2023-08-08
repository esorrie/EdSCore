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
<div class="margintop">
  <x-card.card title="upcoming fixtures">
      <div class="borderbottom text">
          <div class="pt-4 text-xl text-center"> {{ $league->name }} </div>
          <div class="padding  uppercase">
            {{-- {{ dd( $fixtures) }} TODO: Need to get the fixture to update based on whats next--}} 
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $fixture->home_team_id}}/ {{ $fixture->home_team_slug}}"> {{ $fixture->home_team }} </a> </div>
              <div class="text-center orange font-bold"> vs </div>
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $fixture->away_team_id}}/ {{ $fixture->away_team_slug}}"> {{ $fixture->away_team }} </a> </div>
              <div class="text-center orange"> {{ $fixture->date }}</div>
          </div>    
      </div>  
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="top teams">
    <div class="borderbottom padding">
      <div class="flex text uppercase">
        <div class="border rounded-lg padding mr-4 w-96 text-center">
          <div class="orange "> #1 </div>
          <div class=""> newcastle united </div>
          <div class=""> 0-0-0 </div>
        </div>
        <div class="border rounded-lg padding mr-4 w-96 text-center">
          <div class="orange"> #2 </div>
          <div class=""> newcastle united </div>
          <div class=""> 0-0-0 </div>
        </div>
        <div class="border rounded-lg padding w-96 text-center">
          <div class="orange"> #3 </div>
          <div class=""> newcastle united </div>
          <div class=""> 0-0-0 </div>
        </div>
      </div>
    </div>  
  </x-card.card>
</div>
<div class="text-xs text"><a href="/leagues">Go Back to leagues</a></div>

@endsection 