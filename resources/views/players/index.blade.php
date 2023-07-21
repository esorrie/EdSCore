@extends('layouts.base')

@section('content')

<div class="playernav">
  <div class="playersdisplay"> PLAYERS</div>
      <div class="card_searchbar">
          <input type="text" placeholder="Search...">
      </div>
</div>

<div class="playertableheader">
  <div class="playerheader"> PLAYER</div>
  <div class="positionheader"> POSITION</div>
  <div class="teamheader"> CLUB </div>
</div>

@foreach ($players as $player)
    <div class="playertablecontents">
        <div class="playername">
            <a href="/players/{{ $player->id }}/{{ $player->slug }}">
                {!! $player->name !!} </a>
        </div>
        <div class="playerposition"> {!! $player->position !!} </div>
        <div class="teamname"> {!! $player->team->name !!} </div> 
    </div>
@endforeach

<div class="pagination">
{{ $players->links() }}
<a href="/">Go Back Home</a>
</div>
@endsection

