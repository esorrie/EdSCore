@extends('layouts.base')

@section('content')

<div class="leaguenav">
  <div class="leaguesdisplay"> LEAGUES</div>
    <div class="card_searchbar">
          <input type="text" placeholder="Search...">
    </div>
</div>

<div class="grid grid-cols-2 w-full">
    <div class="w-full bg-gray-200">
        <p class="text-white">League</p>
    </div>
    <div class="w-full bg-gray-200">
        <p class="text-white">Location</p>
    </div>
    
    @foreach ($leagues as $league)
    <div class="league text-white">
        <a href="/leagues/{{ $league->id }}/{{ $league->slug }}">
            {!! $league->name !!}
        </a>
    </div>
    <div class="location text-white">ENGLAND</div>
    @endforeach
</div>

<div class="card">
    <div class="heading"></div>
    <div class="body"></div>
</div>

<a href="/">Go Back Home</a>
@endsection
