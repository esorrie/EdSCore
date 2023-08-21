@extends('layouts.base')

@section('content')

<x-leaguecomponents.overview :league="$league"/>


<x-leaguecomponents.mininav :league="$league" />

<div class="margintop">
  <x-card.card title="upcoming fixtures">
      <div class="borderbottom text">
          <div class="pt-4 text-xl text-center"> {{ $league->name }} </div>
          <div class="padding  uppercase">
            {{-- {{ dd( $fixtures) }} TODO: Need to get the fixture to update based on whats next--}} 
              <div class="text-center text-2xl font-bold"> <img style="width:50px;height:50px;" src="{{ $fixture->home_team_crest }}"> <a href="/teams/{{ $fixture->home_team_id}}/ {{ $fixture->home_team_slug}}"> {{ $fixture->home_team }} </a> </div>
              <div class="text-center orange font-bold"> vs </div>
              <div class="text-center text-2xl font-bold"> <img style="width:50px;height:50px;" src="{{ $fixture->away_team_crest }}"> <a href="/teams/{{ $fixture->away_team_id}}/ {{ $fixture->away_team_slug}}"> {{ $fixture->away_team }} </a> </div>
              <div class="text-center orange"> {{ $fixture->date }} </div>
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