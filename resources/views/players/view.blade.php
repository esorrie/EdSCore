@extends('layouts.base')

@section('content')

<div class="playeroverview">
  <div class="playercard">
    <div class="playername"> {!! $player->name !!}</a> </div>
      <div class="playerteam"> <span class="orange"> {!! $player->team->name !!} </span> <span class="grey"> | </span> {!! $player->position !!} </div>
  </div>  
</div>

<div class="flex justify-evenly">
  <div class="grid grid-cols-2">
    <div class="details margintop">
      <x-card.card title="Player Details">
        <x-table.table :tableData="$playerTableData"/>
      </x-card.card>
    </div>
  </div>
</div>

<div class="text-sm text"> <a href="/players">Go Back to players</a> </div>

@endsection