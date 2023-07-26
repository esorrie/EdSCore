@extends('layouts.base')

@section('content')

<x-managercomponents.overview :manager="$manager"/>


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

