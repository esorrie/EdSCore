
<div id="one" class="nav w-full">
    
    <div class="menu">
        <div class="card1">
            <a href="/"><span class="text-orange">ED</span>SCORE</a>
        </div>
        <div class="card2">
            <a class="{{ request()->routeIs('leagues.index') ? 'active' : '' }}" href="{{ route('leagues.index') }}">LEAGUES</a>
        </div>
        <div class="card3">
            <a class="{{ request()->routeIs('teams.index') ? 'active' : '' }}" href="{{ route('teams.index') }}">TEAMS</a>
        </div>
        <div class="card3">
            <a class="{{ request()->routeIs('players.index') ? 'active' : '' }}" href="{{ route('players.index') }}">PLAYERS</a>
        </div>
        <div class="card3">
            <a class="{{ request()->routeIs('managers.index') ? 'active' : '' }}" href="{{ route('managers.index') }}">MANAGERS</a>
        </div>
    </div>
    
    <div class="card_searchbar">
        <input type="text" placeholder="Search...">
    </div>
</div>