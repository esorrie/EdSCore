@extends('layouts.base')

@section('content')

<x-teamcomponents.overview :team="$team" />

<x-teamcomponents.miniteamnav :team="$team" />

<x-teamcomponents.fixtures :team="$team" />

@endsection