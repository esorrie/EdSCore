@extends('layouts.base')

@section('content')

<x-leaguecomponents.overview :league="$league"/>

<x-leaguecomponents.mininav :league="$league" />

<x-leaguecomponents.fixtures :fixtures="$fixtures" />


<a href="/leagues">Go Back to leagues</a>

@endsection 