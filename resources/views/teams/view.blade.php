@extends('layouts.base')

@section('content')

<div class="teamoverview">
  <div class="teamcard">
    <div class="teamname"> {!! $team->name !!}</div>
      <div class="teamnation"> <span class="orange"> LOCATION </span> <span class="grey"> | </span> {!! $team->totalPlayers !!} PLAYERS </div>
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

<div class="flex justify-evenly">
  <div class="grid grid-cols-2">
    <div class="details">
      <x-card.card title="Team Details">
        <x-table.table :tableData="$teamTableData"/>
      </x-card.card>
    </div>
  </div>
  <div class="w-full">
    <x-leaguecomponents.fixturepreview />
  </div>
  
</div>

<div class="details text margintop">
  <div class="bordertop bg-darkgrey text grid grid-cols-9">
    <div class="col-span-4 padding"> TEAM</div>
    <div class="self-center smallpadding"> P</div>
    <div class="self-center smallpadding"> W</div>
    <div class="self-center smallpadding"> D</div>
    <div class="self-center smallpadding"> L</div>
    <div class="self-center smallpadding"> PTS</div>
  </div>

  <div class="uppercase text-sm">
    <div class="">
      <div class="grid grid-cols-9 border grid-rows-5">
        @foreach ($teams as $team)
        <div class="col-span-4 border smallpadding hover:bg-darkgrey duration-500"> <a href="/teams/{{ $team->id }}/{{ $team->slug }}"> {!! $team->name !!} </a></div>
          <div class="border smallpadding"> {{ $team->played }}</div>
          <div class="border smallpadding"> {{ $team->won }}</div>
          <div class="border smallpadding"> {{ $team->drawn }}</div>
          <div class="border smallpadding"> {{ $team->lost }}</div>
          <div class="border smallpadding"> {{ $team->played }}</div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="details margintop w-full ">
    <div class="bordertop bg-darkgrey smallpadding text ">GAME STATS</div>
      <div class="grid grid-cols-17  text">
        <div class="border bg-darkgrey smallpadding col-span-2"> DATE </div>
        <div class="border bg-darkgrey smallpadding col-span-3"> OPP </div>
        <div class="border bg-darkgrey smallpadding col-span-4"> RESULT </div>
        <div class="border bg-darkgrey smallpadding"> G </div>
        <div class="border bg-darkgrey smallpadding"> CONC </div>
        <div class="border bg-darkgrey smallpadding"> S </div>
        <div class="border bg-darkgrey smallpadding"> SoT </div>
        <div class="border bg-darkgrey smallpadding"> xG </div>
        <div class="border bg-darkgrey smallpadding"> xA </div>
        <div class="border bg-darkgrey smallpadding"> xGA </div>
        <div class="border bg-darkgrey smallpadding"> xAA </div>
        <div class="text col-span-2">hgfd</div>
        <div class="text col-span-3">hgfd</div>
        <div class="text col-span-4">hgfd</div>
        <div class="text"> 3</div>
        <div class="text"> 2</div>
        <div class="text"> 23</div>
        <div class="text"> 5</div>
        <div class="text"> 2.4</div>
        <div class="text"> 1.1</div>
        <div class="text"> 0.6</div>
        <div class="text"> 0.7</div>
      </div>
  </div> 

</div>

  

<div class="text-xs text"><a href="/teams">Go Back to teams</a></div>

@endsection