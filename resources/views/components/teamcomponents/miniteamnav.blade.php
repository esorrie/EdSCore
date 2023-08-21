<div class="mb-4 bg-gradient-to-b from-fadegrey to-black border rounded-b-lg flexcenter h-14 pl-14">
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.view') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}"> OVERVIEW </a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.fixtures') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/fixtures"> FIXTURES</a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.results') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/results"> RESULTS</a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.players') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/players"> PLAYERS</a> 
    </div>
  </div>
  