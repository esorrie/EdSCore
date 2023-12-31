@extends('layouts.base')

@section('content')

<x-leaguecomponents.overview :league="$league"/>


<x-leaguecomponents.mininav :league="$league" />

<div class="margintop">
  <x-card.card title="upcoming fixtures">
      <div class="borderbottom text hover:bg-grey duration-500">
          <div class="pt-4 text-xl text-center"> {{ $league->name }} </div>
          <div class="padding  uppercase">
            <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $fixture->home_team_id}}/ {{ $fixture->home_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $fixture->home_team_crest }}"> {{ $fixture->home_team }} </a> </div>
            <div class="text-center orange font-bold"> vs </div>
            <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $fixture->away_team_id}}/ {{ $fixture->away_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $fixture->away_team_crest }}"> {{ $fixture->away_team }} </a> </div>
            <div class="pt-4 text-center orange"> {{ $fixture->date }} </div>
          </div>    
      </div>   
  </x-card.card>
</div>

<div class="text-xs text"><a href="/leagues">Go Back to leagues</a></div>

@endsection 