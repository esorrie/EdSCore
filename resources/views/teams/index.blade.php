@extends('layouts.base')

@section('content')

<x-teamcomponents.teamnav />

<div class="grid grid-cols-3 text margintop">
  <div class="w-full bg-darkgrey border rounded-tl-lg"> 
    <p class="text pl-4 uppercase">Team</p> 
  </div>
  <div class="w-full bg-darkgrey border"> 
    <p class="text pl-4 uppercase">Stadium</p> 
  </div>
  <div class="bg-darkgrey border rounded-tr-lg">
    <p class="text pl-4 uppercase">League</p>
  </div>
  
  @foreach ($teams as $team)
  <div class="">
    <div class=" padding border hover:bg-orange duration-500">
      <a href="/teams/{{ $team->id }}/{{ $team->slug }}">
        {!! $team->name !!}
      </a>
    </div>
  </div>
  <div class="padding border hover:bg-darkgrey duration-500"> {!! $team->stadium !!} </div>
  <div class="padding border hover:bg-darkgrey duration-500"> {!! $team->league->name !!} </div>
  @endforeach
</div>
  
<div class="pagination text">
  {{ $teams->links() }}
</div>
<div class="text-xs text"><a href="/">Go Back Home</a></div>

@endsection
