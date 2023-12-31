@extends('layouts.base')

@section('content')

<x-leaguecomponents.leaguenav />    

<div class="grid grid-cols-2 margintop text uppercase">
    <div class="w-full bg-darkgrey border rounded-tl-lg">
        <p class="text ml-2">League</p>
    </div>
    <div class=" bg-darkgrey border rounded-tr-lg">
        <p class="text ml-2">Location</p>
    </div>
    
    @foreach ($leagues as $league)
    <div class="text-sm smallpadding border hover:bg-orange duration-500 hover:font-bold ">
        <a href="/leagues/{{ $league->id }}/{{ $league->slug }}">
            <div class="w-fit"> <img style="width:50px;height:50px; "src="{{ $league->emblem }}"> </div>
                {{ $league->name }}
            </a>
        </div>
    <div class="text-sm orange padding border hover:bg-darkgrey duration-500"> 
        <div class="w-fit"> <img style="width:50px;height:50px; "src="{{ $league->country_flag }}"> </div>
            {{ $league->location }}
        </div>
    @endforeach

    @forelse ($leagues as $league)
        
    @empty
    <div>
        <p class="text-center">
            No results found for query 
        </p>
        <p class="text-center">
            <strong> {{ request()->query('name') }} </strong>
        </p>
    </div>
    @endforelse
</div> 

<div class="pagination text ">
    {{ $leagues->appends(['name' => request()->query('name') ])->links() }} {{-- appends allows for the search parameters to be kept when looking over multiple pages--}}
    <div class="text-xs text"><a href="/">Go Back Home</a></div>
</div>

@endsection
