@extends('layouts.base')

@section('content')

<div class="manageroverview">
  <div class="managercard">
    <div class="managername"> {!! $manager->name !!}</a> </div>
      <div class="managerteam"> <span class="orange"> {!! $manager->team->name !!} </span> <span class="grey"> | </span> MANAGER</div>
  </div>  
</div>

<div class="margintop">
  <div class="grid grid-cols-2">
    <div class="details">
      <x-card.card title="Manger Details">
        <x-table.table :tableData="$managerTableData"/>
      </x-card.card>
    </div>
  </div>
</div>

<div class="">
  <x-table.leaguetablepreview :teams="$teams"/>
</div>

@endsection

