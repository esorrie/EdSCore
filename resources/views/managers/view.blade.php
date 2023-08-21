@extends('layouts.base')

@section('content')

<x-managercomponents.overview :manager="$manager"/>


<div class="">
  <div class="flex">
    <div class="details margintop">
      <x-card.card title="Manger Details">
        <x-table.table :tableData="$managerTableData"/>
      </x-card.card>
    </div>
    <div class="text-white w-full margintop ml-20">
      <x-card.card title="upcoming fixtures">
          <div class="borderbottom">
            <div class="padding text uppercase">
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $manager->team->nextFixture->home_team_id}}/ {{ $manager->team->nextFixture->home_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $manager->team->nextFixture->home_team_crest }}"> {{ $manager->team->nextFixture->home_team }} </a> </div> 
              <div class="text-center orange font-bold"> vs </div>
              <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $manager->team->nextFixture->away_team_id}}/ {{ $manager->team->nextFixture->away_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $manager->team->nextFixture->away_team_crest }}"> {{ $manager->team->nextFixture->away_team }} </a> </div>
              <div class="text-center orange"> {{ $manager->team->nextFixture->date }} </div>
            </div>    
          </div>  
      </x-card.card>
    </div>
  </div>
</div>

<div class="flex jusitfy-evenly">

    <div class="details">
      <x-managercomponents.leaguetablepreview :manager="$manager"/>
    </div>

    <div class="w-full ml-20">
      <div class="margintop text uppercase">
        <div class="bordertop bg-darkgrey smallpadding  "> Season STATS</div>
          <div class="grid grid-cols-11 text-xs">
            <div class="border bg-darkgrey smallpadding col-span-2"> date </div>
            <div class="border bg-darkgrey smallpadding col-span-2"> opp </div>
            <div class="border bg-darkgrey smallpadding"> result </div>
            <div class="border bg-darkgrey smallpadding"> g </div>
            <div class="border bg-darkgrey smallpadding"> conc </div>
            <div class="border bg-darkgrey smallpadding"> s </div>
            <div class="border bg-darkgrey smallpadding"> s </div>
            <div class="border bg-darkgrey smallpadding "> xg </div>
            <div class="border bg-darkgrey smallpadding"> xa </div>
            <div class="border smallpadding col-span-2"> 26/07/23</div>
            <div class="border smallpadding col-span-2"> sunderland</div>
            <div class="border smallpadding"> 12-0 </div>
            <div class="border smallpadding"> 3</div>
            <div class="border smallpadding"> 2</div>
            <div class="border smallpadding"> 23</div>
            <div class="border smallpadding"> 5</div>
            <div class="border smallpadding"> 2.4</div>
            <div class="border smallpadding"> 1.1</div>
          </div>
      </div> 
    </div>
</div>
@endsection

