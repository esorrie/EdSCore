@extends('layouts.base')

@section('content')

<x-teamcomponents.overview :team="$team" />

<x-teamcomponents.miniteamnav :team="$team" />

<x-teamcomponents.results :team="$team" />

@endsection