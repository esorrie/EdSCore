@extends('layouts.base')

@section('content')

<x-teamcomponents.overview :team="$team"/>

<x-teamcomponents.miniteamnav :team="$team" />

<div class="">
  <x-card.card title="Goalkeepers">
    <x-playercomponents.playerlist :players="$players->where('position', 'Goalkeeper')" />
  </x-card.card>
</div>

<div class="margintop">
  <x-card.card title="Defenders">
    <x-playercomponents.playerlist :players="$players->where('position', 'Defence')" />
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="Midfielders">
    <x-playercomponents.playerlist :players="$players->where('position', 'Midfield')" />
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="Attackers">
    <x-playercomponents.playerlist :players="$players->where('position', 'Offence')" />
  </x-card.card>
</div>
@endsection