<div class="leagueoverview">
  <div class="w-fit ml-10"> <img style="width:150px;height:150px; "src="{{ $league->emblem }}"> </div>
    <div class="leaguecard">
      <div class="leaguename"> {!! $league->name !!}</div>
        <div class="leaguenation"> <span class="orange"> {!! $league->location!!}</span> <span class="grey"> | </span> {!! $league->totalTeams !!} CLUBS </div>
    </div>
  </div>