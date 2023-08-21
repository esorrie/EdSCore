@extends('layouts.base')

@section('content')

<x-teamcomponents.overview :team="$team"/>

<x-teamcomponents.miniteamnav :team="$team" />

<div class="flex">
    <div class="details">
      <x-card.card title="Team Details">
        <x-table.table :tableData="$teamTableData"/>
      </x-card.card>
    </div>
    <div class="text-white w-full ml-20">
      <x-card.card title="upcoming fixtures">
          <div class="borderbottom">
            <div class="padding text uppercase">
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $team->nextFixture->home_team_id}}/ {{ $team->nextFixture->home_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $team->nextFixture->home_team_crest }}"> {{ $team->nextFixture->home_team }} </a> </div> 
              <div class="text-center orange font-bold"> vs </div>
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $team->nextFixture->away_team_id}}/ {{ $team->nextFixture->away_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $team->nextFixture->away_team_crest }}"> {{ $team->nextFixture->away_team }} </a> </div>
              <div class="text-center orange"> {{$team->nextFixture->date}} </div>
            </div>    
          </div>  
      </x-card.card>
    </div>
</div>

<div class="flex justify-start">
  <div class="details">
    <x-leaguecomponents.leaguetablepreview :team="$team" /> 
  </div>
</div>
  

<div class="text-xs text"><a href="/teams">Go Back to teams</a> </div>

@endsection