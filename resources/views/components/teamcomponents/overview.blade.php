<div class="teamoverview">
  <div class="w-fit ml-10"> <img style="width:150px;height:150px; "src="{{ $team->crest }}"> </div>
  <div class="teamcard">
      <div class="teamname"> {!! $team->name !!}</div>
    <div class="teamnation"> <span class="orange"> {!! $team->location !!} </span> <span class="grey"> | </span> {!! $team->totalPlayers !!} PLAYERS </div>
  </div>
</div>