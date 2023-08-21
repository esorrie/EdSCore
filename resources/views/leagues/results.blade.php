@extends('layouts.base')

@section('content')

<x-leaguecomponents.overview :league="$league"/>

<x-leaguecomponents.mininav :league="$league" />

<x-leaguecomponents.results :results="$results" />

<a href="/leagues">Go Back to leagues</a>

@endsection 