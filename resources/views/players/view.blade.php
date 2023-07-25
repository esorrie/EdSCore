@extends('layouts.base')

@section('content')

<div class="playeroverview">
  <div class="playercard">
    <div class="playername"> {!! $player->name !!}</a> </div>
      <div class="playerteam"> <span class="orange"> {!! $player->team->name !!} </span> <span class="grey"> | </span> {!! $player->position !!} </div>
  </div>  
</div>

<div class="">
  <div class="details margintop">
    <div class="bg-darkgrey bordertop padding text">PERSONAL DETAILS</div>
    <div class="grid grid-cols-2 grid-rows-5 details">
      <div class="border text-sm text smallpadding"> NATIONALITY</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {{ $player->country_of_origin }}</div>
        <div class="border text-sm text smallpadding"> DATE OF BRIRTH</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {{ $player->date_of_birth }}</div>
        <div class="border text-sm text smallpadding"> HEIGHT</div>
        <div class="border text-sm text smallpadding uppercase text-right"> #</div>
        <div class="border text-sm text smallpadding"> NUMBER</div>
        <div class="border text-sm text smallpadding uppercase text-right"> #</div>
        <div class="border text-sm text smallpadding"> NICKNAME</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {{ $player->nickname }}</div>
    </div>
  </div>
</div>

<div class="text-sm text"> <a href="/players">Go Back to players</a> </div>

@endsection