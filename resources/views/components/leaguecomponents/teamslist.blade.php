<div class="grid grid-cols-3">
    <div class="bg-darkgrey border rounded-tl-lg smallpadding">
        <div class="text"> TEAM</div>
    </div>
    <div class="bg-darkgrey border smallpadding">
        <div class="text">STADIUM</div>
    </div>
    <div class="bg-darkgrey border rounded-tr-lg smallpadding">
      <div class="text">CAPACITY</div>
    </div>
      @foreach ($teams as $team)
        <div class="text-sm text smallpadding border hover:bg-orange duration-500">
          <a href="/teams/{{ $team->id }}/{{ $team->slug }}">
            {{ $team->name }}
          </a>
        </div>
        <div class="text-sm text smallpadding border duration-500">
            {{ $team->stadium}}
        </div>
        <div class="text-sm text smallpadding border duration-500">
            {{ $team->capacity}}
        </div>
      @endforeach
</div>
