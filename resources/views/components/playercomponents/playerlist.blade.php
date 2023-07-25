<div class="grid grid-cols-3">
    <div class="bg-darkgrey border rounded-tl-lg smallpadding">
        <div class="text"> NAME</div>
    </div>
    <div class="bg-darkgrey border smallpadding">
        <div class="text"> DATE OF BIRTH</div>
    </div>
    <div class="bg-darkgrey border rounded-tr-lg smallpadding">
      <div class="text"> POSITION</div>
    </div>
  
      @foreach ($players as $player)
        <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
          <a href="/players/{{ $player->id }}/{{ $player->slug }}">
            {{ $player->name }}
          </a>
        </div>
        <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
          {{ $player->date_of_birth }}
        </div>
        <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
          {{ $player->position }}
        </div>
    @endforeach
  </div>