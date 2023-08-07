<div class="leagueoverview">
    <div class="leaguecard">
      <div class="leaguename"> {!! $manager->name !!}</div>
      <div class="managerteam"> <a href="/teams/{{ $manager->team->id }}/ {{ $manager->team->slug }}"> <span class="orange"> {!! $manager->team->name !!} </span> </a> <span class="grey"> | </span> MANAGER</div>
    </div>
  </div>