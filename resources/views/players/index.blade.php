@extends('layouts.base')

@section('content')

<x-playercomponents.playernav />


<div class="grid grid-cols-3 margintop">
    <div class="bg-darkgrey border rounded-tl-lg padding">
        <div class="text"> NAME</div>
    </div>
    <div class="bg-darkgrey border padding">
        <div class="text"> POSITION</div>
    </div>
    <div class="bg-darkgrey border rounded-tr-lg padding">
      <div class="text"> CLUB</div>
    </div>

@foreach ($players as $player)
    <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
        <a href="/players/{{ $player->id }}/{{ $player->slug }}"> {!! $player->name !!} </a>
    </div>
    <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">    
        {!! $player->position !!} 
    </div>
    <div class="text-sm text smallpadding border hover:bg-darkgrey duration-500">
        {!! $player->team->name !!} 
    </div> 
@endforeach

<div class="pagination">
{{ $players->links() }}
<div class="text-sm text"><a href="/">Go Back Home</a> </div>
</div>
@endsection

