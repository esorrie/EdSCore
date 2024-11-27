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
    <x-playercomponents.playerlist :players="$players->whereIn('position', 
    ['Defence',
    'Centre-Back',
    'Left-Back',
    'Right-Back',
    ])" />
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="Midfielders">
    <x-playercomponents.playerlist :players="$players->whereIn('position', 
    ['Midfield',
    'Attacking Midfield',
    'Central Midfield',
    'Defensive Midfield',
    'Left Midfield',
    'Right Midfield'
    ])" />
  </x-card.card>
</div>
<div class="margintop">
  <x-card.card title="Attackers">
    <x-playercomponents.playerlist :players="$players->whereIn('position', 
    ['Offence',
    'Centre-Forward',
    'Left Winger',
    'Right Winger'
    ])" />
  </x-card.card>
</div>
@endsection