@extends('layouts.base')

@section('content')

<x-playercomponents.overview :player="$player"/>


<div class="">
  <div class="flex">
    <div class="details margintop">
      <x-card.card title="player details">
        <x-table.table :tableData="$playerTableData"/>
      </x-card.card>
    </div>
    <div class="text-white w-full margintop ml-20">
      <x-card.card title="upcoming fixtures">
          <div class="borderbottom">
            <div class="padding text uppercase hover:bg-grey duration-500">
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $player->team->nextFixture->home_team_id}}/ {{ $player->team->nextFixture->home_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $player->team->nextFixture->home_team_crest }}"> {{ $player->team->nextFixture->home_team }} </a> </div> 
              <div class="text-center orange font-bold"> vs </div>
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $player->team->nextFixture->away_team_id}}/ {{ $player->team->nextFixture->away_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $player->team->nextFixture->away_team_crest }}"> {{ $player->team->nextFixture->away_team }} </a> </div>
              <div class="text-center orange"> {{ $player->team->nextFixture->date }} </div>
            </div>    
          </div>  
      </x-card.card>
    </div>
  </div>
</div>
<div class="">
  <div class="flex">
    <div class="details margintop">
      <x-card.card title="stats">
        <x-table.table :tableData="$statTableData"/>
      </x-card.card>
    </div>
    <div class="w-full ml-20">
      <div class="margintop text uppercase">
        <div class="bordertop bg-darkgrey smallpadding  "> season stat</div>
          <div class="grid grid-cols-10 text-xs">
            <div class="border bg-darkgrey smallpadding "> Matches </div>
            <div class="border bg-darkgrey smallpadding "> Started </div>
            <div class="border bg-darkgrey smallpadding"> Minutes </div>
            <div class="border bg-darkgrey smallpadding"> Goals </div>
            <div class="border bg-darkgrey smallpadding"> Own Goals </div>
            <div class="border bg-darkgrey smallpadding"> Assists </div>
            <div class="border bg-darkgrey smallpadding"> Pens </div>
            <div class="border bg-darkgrey smallpadding "> Yellow </div>
            <div class="border bg-darkgrey smallpadding"> Yellow->Red </div>
            <div class="border bg-darkgrey smallpadding"> Red </div>
            <div class="border smallpadding"> 38 </div>
            <div class="border smallpadding"> 29 </div>
            <div class="border smallpadding"> 2397 </div>
            <div class="border smallpadding"> 14 </div>
            <div class="border smallpadding"> 0 </div>
            <div class="border smallpadding"> 7 </div>
            <div class="border smallpadding"> 3 </div>
            <div class="border smallpadding"> 8 </div>
            <div class="border smallpadding"> 1 </div>
            <div class="border smallpadding"> 1 </div>
          </div>
      </div> 
    </div>
  </div>
</div>


<div class="text-sm text"> <a href="/players">Go Back to players</a> </div>

@endsection