@extends('layouts.base')

@section('content')

<x-leaguecomponents.leaguenav />    

<div class="grid grid-cols-2 margintop text">
    <div class="w-full bg-darkgrey border rounded-tl-lg">
        <p class="text ml-2">League</p>
    </div>
    <div class=" bg-darkgrey border rounded-tr-lg">
        <p class="text ml-2">Location</p>
    </div>
    
    @foreach ($leagues as $league)
    <div class="text-sm smallpadding border hover:bg-orange duration-500">
        <a href="/leagues/{{ $league->id }}/{{ $league->slug }}">
            {!! $league->name !!}
        </a>
    </div>
    <div class="text-sm smallpadding border hover:bg-darkgrey duration-500">ENGLAND</div>
    @endforeach
</div> 

<div class="text-xs text"><a href="/">Go Back Home</a></div>
@endsection
