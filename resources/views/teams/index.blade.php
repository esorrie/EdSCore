@extends('layouts.base')

@section('content')

<div class="teamnav">
  <div class="teamsdisplay"> TEAMS</div>
    <div class="card_searchbar">
          <input type="text" placeholder="Search...">
    </div>
</div>

<div class="teamtableheader">
  <div class="teamheader"> TEAM</div>
  <div class="leagueheader"> LEAGUE</div>
</div>

@foreach ($teams as $team)
  <div class="teamtablecontents">
    <div class="teamname">
      <a href="/teams/{{ $team->id }}/{{ $team->slug }}">
        {!! $team->name !!}
      </a>
    </div>
    <p>
      League: {{ $team->league->name }},
      Manager: {{ $team->manager->name }},
      Squad size: {{ $team->totalPlayers}}
    </p>
    <div class="leaguename"> {!! $team->league->name !!} </div>
  </div>
@endforeach

<div class="pagination">
  {{ $teams->links() }}
</div>
@endsection
