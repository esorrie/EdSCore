<div class="teamnav">
    <div class="teamsdisplay"> TEAMS</div>
    <form action="{{ route('teams.index') }}" method="GET">
      <div class="card_searchbar menu">
          <input type="text" name="name" class="border border-grey text-sm rounded-lg w-full" value="{{ request()->query('name') }}" placeholder="Search...">
      </div>
  </form>
</div>