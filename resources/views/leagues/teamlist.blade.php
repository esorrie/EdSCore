@extends('layouts.base')

@section('content')

<x-leaguecomponents.overview :league="$league"/>

<x-leaguecomponents.mininav :league="$league" />

<x-leaguecomponents.teamslist :teams="$teams" />

@endsection 