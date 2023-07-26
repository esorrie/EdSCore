@extends('layouts.base')

@section('content')

<x-playercomponents.overview :player="$player"/>


<div class="">
  <div class="grid grid-cols-2">
    <div class="details margintop">
      <x-card.card title="player details">
        <x-table.table :tableData="$playerTableData"/>
      </x-card.card>
    </div>
  </div>
</div>
<div class="">
  <div class="grid grid-cols-2">
    <div class="details margintop">
      <x-card.card title="stats">
        <x-table.table :tableData="$statTableData"/>
      </x-card.card>
    </div>
  </div>
</div>
<div class="text-sm text"> <a href="/players">Go Back to players</a> </div>

@endsection