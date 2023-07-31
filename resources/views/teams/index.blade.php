@extends('layouts.base')

@section('content')

<x-teamcomponents.teamnav />

<div class="grid grid-cols-3 text margintop uppercase">
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
  <div class="text-sm">
    <div class="smallpadding border hover:bg-orange duration-500 hover:font-bold">
      <a href="/teams/{{ $team->id }}/{{ $team->slug }}">
      <div class="w-fit"> <img style="width:50px;height:50px;" src="{{ $team->crest }}"> </div>
        {!! $team->name !!}
      </a>
    </div>
  </div>
  <div class="smallpadding border hover:bg-darkgrey duration-500 text-sm orange"> {!! $team->stadium !!} </div>
  <div class="smallpadding border hover:bg-darkgrey duration-500 text-sm hover:font-bold"> 
    

    
  </div>
  @endforeach
</div>
  
<div class="pagination text">
  {{ $teams->links() }}
</div>
<div class="text-xs text"><a href="/">Go Back Home</a></div>

@endsection
