@extends('layouts.base')

@section('content')

<x-managernav />

<div class="grid grid-cols-3 margintop">
    <div class="bg-darkgrey border rounded-tl-lg smallpadding">
        <div class="text"> NAME</div>
    </div>
    <div class="bg-darkgrey border smallpadding">
        <div class="text"> TEAM</div>
    </div>
    <div class="bg-darkgrey border rounded-tr-lg smallpadding">
        <div class="text"> LEAGUE</div>
    </div>

@foreach ($managers as $manager)
    <div class="text-sm text uppercase smallpadding border hover:bg-darkgrey duration-500">
        <a href="/players/{{ $manager->id }}/{{ $manager->slug }}"> {!! $manager->name !!} </a>
    </div>
    <div class="text-sm text uppercase smallpadding border hover:bg-darkgrey duration-500">
        {!! $manager->team->name !!} 
    </div> 
    <div class="text-sm text uppercase smallpadding border hover:bg-darkgrey duration-500">
        {!! $manager->team->league->name !!} 
    </div> 
@endforeach

<div class="pagination text">
{{ $managers->links() }}
<a href="/">Go Back Home</a>
</div>

@endsection
