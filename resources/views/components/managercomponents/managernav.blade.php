<div class="managernav">
    <div class="managersdisplay"> MANAGERS</div>
    <form action="{{ route('managers.index') }}" method="GET">
        <div class="card_searchbar menu">
            <input type="text" name="name" class="border border-grey text-sm rounded-lg w-full" value="{{ request()->query('name') }}" placeholder="Search...">
        </div>
    </form>
</div>