
<div id="one" class="nav">
    
    <div class="menu">
        <div class="card1 font-bold">
            <a href="/"><span class="text-orange">EDS</span>SCORE</a>
        </div>
        <div class="card2 hover:font-bold">
            <a class="{{ request()->routeIs('leagues.index') ? 'active' : '' }}" href="{{ route('leagues.index') }}">LEAGUES</a>
        </div>
        <div class="card3 hover:font-bold">
            <a class="{{ request()->routeIs('teams.index') ? 'active' : '' }}" href="{{ route('teams.index') }}">TEAMS</a>
        </div>
        <div class="card3 hover:font-bold">
            <a class="{{ request()->routeIs('players.index') ? 'active' : '' }}" href="{{ route('players.index') }}">PLAYERS</a>
        </div>
        <div class="card3 hover:font-bold mr-96">
            <a class="{{ request()->routeIs('managers.index') ? 'active' : '' }}" href="{{ route('managers.index') }}">MANAGERS</a>
        </div>
    </div>
    
    <div class="menu">
        <div class="card4 hover:font-bold uppercase text-right">
            <a class="{{ request()->routeIs('register.create') ? 'active' : '' }}" href="{{ route('register.create') }}"> Register</a>
        </div>
        <div class="card4 hover:font-bold uppercase">
            <a class="{{ request()->routeIs('users.login') ? 'active' : '' }}" href="{{ route('users.login') }}"> Login</a>
        </div>
    </div>
        
    <div class="card_searchbar">
        <input type="text" placeholder="Search...">
    </div>
</div>