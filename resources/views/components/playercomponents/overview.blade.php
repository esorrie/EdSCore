<div class="leagueoverview">
    <div class="leaguecard">
      <div class="leaguename"> {!! $player->name !!}</div>
      <div class="managerteam"> <a href="/teams/{{ $player->team->id }}/ {{ $player->team->slug }}"> <span class="orange"> {!! $player->team->name !!} </span> </a> <span class="grey"> | </span> {{ $player->position}}</div> 
    </div>
  </div>