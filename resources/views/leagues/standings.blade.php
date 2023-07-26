@extends('layouts.base')

@section('content')

<div class="leagueoverview">
  <div class="leaguecard">
    <div class="leaguename"> {!! $league->name !!}</div>
      <div class="leaguenation"> <span class="orange"> LOCATION </span> <span class="grey"> | </span> {!! $league->totalTeams !!} CLUBS </div>
  </div>
</div>

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

{{-- TODO : fix league table component  --}}
<div class="grid grid-cols-14 text jusitfy-between">
    <div class="border rounded-tl-lg bg-darkgrey smallpadding text">
        <div class=""> # </div>
    </div>
    <div class="border bg-darkgrey smallpadding text col-span-3">
        <div class=""> TEAM </div>
    </div>
    <div class="border bg-darkgrey smallpadding text ">
        <div class=""> PLAYED </div>
    </div>
    <div class="border bg-darkgrey smallpadding text ">
        <div class=""> WON </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> DRAWN </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> LOST </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> GF </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> GA </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> GD </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> POINTS </div>
    </div>
    <div class="border rounded-tr-lg bg-darkgrey smallpadding text col-span-2">
        <div class=""> NEXT OPP </div>
    </div>

    @foreach ($teams as $team) 
      <div class="smallpadding border"> </div>
      <div class="col-span-3 smallpadding border hover:bg-darkgrey duration-500 uppercase"> {!! $team->name!!} </div>
      <div class="smallpadding border"> {{ $team->played }}</div>
      <div class="smallpadding border"> {{ $team->won }}</div>
      <div class="smallpadding border"> {{ $team->drawn }}</div>
      <div class="smallpadding border"> {{ $team->lost }}</div>
      <div class="smallpadding border"> #</div>
      <div class="smallpadding border"> #</div>
      <div class="smallpadding border"> #</div>
      <div class="smallpadding border"> #</div>
      <div class="col-span-2 smallpadding border hover:bg-darkgrey duration-500"> N/A </div>
    @endforeach 
</div>

<div class="text-sm text"><a href="/leagues">Go Back to leagues</a></div>
@endsection 