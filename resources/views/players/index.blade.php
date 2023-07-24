@extends('layouts.base')

@section('content')

<x-playernav />

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

