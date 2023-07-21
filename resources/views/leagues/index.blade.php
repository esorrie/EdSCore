@extends('layouts.base')

@section('content')


<div class="leaguenav">
  <div class="leaguesdisplay"> LEAGUES</div>
    <div class="card_searchbar">
          <input type="text" placeholder="Search...">
    </div>
</div>

<div class="p-20 text-white">
    <div class="w-full flex border bg-gray-400 border-gray-200 rounded p-2 justify-between">
        <div>
            <p>League</p>
        </div>
        <div>
            <p>Location</p>
        </div>
    </div>
    
    @foreach ($leagues as $league)
        <div class="w-full flex border border-gray-200 hover:bg-pink-500 transition duration-500 hover:cursor-pointer rounded p-4 justify-between">        
            <div class="league">
                <a href="/leagues/{{ $league->id }}/{{ $league->slug }}">
                    {!! $league->name !!}
                </a>
            </div>
        </div>
    @endforeach
</div>

<a href="/">Go Back Home</a>
@endsection
