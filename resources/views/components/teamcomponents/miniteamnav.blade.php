<div class="mb-4 bg-gradient-to-b from-fadegrey to-black border rounded-b-lg flexcenter h-14 pl-14 uppercase">
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.view') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}"> overview </a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.fixtures') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/fixtures"> fixtures</a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.results') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/results"> results</a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('teams.players') ? 'active' : '' }}" href="/teams/{{ $team->id }}/{{ $team->slug }}/players"> players</a> 
    </div>
  </div>
  