<div class="leaguenav">
    <div class="leaguesdisplay"> LEAGUES</div>
    <form action="{{ route('leagues.index') }}" method="GET">
        <div class="card_searchbar menu">
            <input type="text" name="name" class="border border-grey text-sm rounded-lg w-full" value="{{ request()->query('name') }}" placeholder="Search...">
        </div>
    </form>
</div>
