@extends('layouts.base')

@section('content')

<x-leaguecomponents.overview :league="$league"/>

<x-leaguecomponents.mininav :league="$league" />

<x-leaguecomponents.leaguetable :league="$league" />


<div class="text-sm text"><a href="/leagues">Go Back to leagues</a></div>
@endsection 