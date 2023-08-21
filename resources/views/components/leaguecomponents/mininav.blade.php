<div class="mb-4 bg-gradient-to-b from-fadegrey to-black border rounded-b-lg flexcenter h-14 pl-14 uppercase">
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('leagues.view') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}"> overview </a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('leagues.standings') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/standings">standings</a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('leagues.fixtures') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/fixtures">fixtures</a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('leagues.results') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/results">results</a> 
    </div>
    <div class="pr-5 grey hover:font-bold"> 
      <a class="{{ request()->routeIs('leagues.teams') ? 'active' : '' }}" href="/leagues/{{ $league->id }}/{{ $league->slug }}/teams">teams</a> 
    </div>
  </div>