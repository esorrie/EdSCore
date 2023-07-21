@extends('layouts.base')

@section('content')

<div class="leagueoverview">
  <div class="leaguecard">
    <div class="leaguename"> {!! $league->name !!}</div>
      <div class="leaguenation"> <span class="orange"> LOCATION </span> <span class="grey"> | </span> {!! $league->totalTeams !!} CLUBS </div>
  </div>
</div>

<div class="leagueviewnav">
    <div class="leagueviewcard1"> 
      <a class="{{ request()->routeIs('leagues.view') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}"> OVERVIEW </a> 
    </div>
    <div class="leagueviewcard2"> 
      <a class="{{ request()->routeIs('leagues.standings') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/standings">STANDINGS</a> 
    </div>
    <div class="leagueviewcard3"> 
      <a class="{{ request()->routeIs('leagues.fixtures') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/fixtures">FIXTURES</a> 
    </div>
    <div class="leagueviewcard4"> 
      <a class="{{ request()->routeIs('leagues.teams') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/teams">TEAMS</a> 
    </div>
</div>

<div class="leagueteams">
    <div class="leagueteamheader">
        <div class="teamheader"></div>
    </div>
</div>

<div class="leagueteamscontents">
    <div class="leagueteam"> </div>
    <div class="teamstadium"> </div>
    <div class="teamcapacity"> </div>
</div>
<a href="/leagues">Go Back to leagues</a>

@endsection 