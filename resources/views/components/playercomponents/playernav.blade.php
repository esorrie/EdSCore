<div class="playernav">
    <div class="playersdisplay"> PLAYERS</div>
    <form action="{{ route('players.index') }}" method="GET">
        <div class="card_searchbar menu">
            <input type="text" name="name" class="border border-grey text-sm rounded-lg w-full" placeholder="Search...">
        </div>
    </form>
</div>