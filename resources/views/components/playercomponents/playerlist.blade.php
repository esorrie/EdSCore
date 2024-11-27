<div class="grid grid-cols-3">
    <div class="bg-darkgrey border smallpadding uppercase">
        <div class="text-sm text"> name</div>
    </div>
    <div class="bg-darkgrey border smallpadding uppercase">
        <div class="text-sm text"> position</div>
    </div>
    <div class="bg-darkgrey border smallpadding uppercase">
        <div class="text-sm text"> country</div>
    </div>

      @foreach ($players as $player )
        <div class="text-sm orange smallpadding border uppercase hover:bg-grey duration-500">
          <a href="/players/{{ $player->id }}/{{ $player->slug }}">
            {{ $player->name }}
          </a>
        </div>
        <div class="text-sm text smallpadding border uppercase">
          {{ $player->position }}
        </div>
        <div class="text-sm orange smallpadding border uppercase">
          {{ $player->country}}
        </div>
      @endforeach
  </div>