<div class="grid grid-cols-3">
    <div class="bg-darkgrey border smallpadding">
        <div class="text-sm text"> NAME</div>
    </div>
    <div class="bg-darkgrey border smallpadding">
        <div class="text-sm text"> DATE OF BIRTH</div>
    </div>
    <div class="bg-darkgrey border smallpadding">
        <div class="text-sm text"> POSITION</div>
    </div>
  
      @foreach ($players as $player )
        <div class="text-sm text smallpadding border uppercase hover:bg-orange duration-500">
          <a href="/players/{{ $player->id }}/{{ $player->slug }}">
            {{ $player->name }}
          </a>
        </div>
        <div class="text-sm text smallpadding border uppercase">
          {{ $player->date_of_birth }}
        </div>
        <div class="text-sm text smallpadding border uppercase">
          {{ $player->position }}
        </div>
      @endforeach
  </div>