@extends('layouts.base')

@section('content')

<x-managercomponents.managernav />

<div class="grid grid-cols-2 margintop">
    <div class="bg-darkgrey border rounded-tl-lg smallpadding">
        <div class="text"> NAME</div>
    </div>
    <div class="bg-darkgrey border smallpadding">
        <div class="text"> TEAM</div>
    </div>

@foreach ($managers as $manager)
    <div class="text-sm text uppercase smallpadding border hover:bg-orange duration-500 hover:font-bold">
        <a href="/managers/{{ $manager->id }}/{{ $manager->slug }}"> {!! $manager->name !!} </a>
    </div>
    <div class="text-sm orange uppercase smallpadding border hover:bg-darkgrey duration-500 hover:font-bold">
        <a href="/teams/{{ $manager->team->id }}/{{ $manager->team->slug }}"> {!! $manager->team->name !!} </a>
    </div>  
@endforeach

{{-- <div class="pagination text">
{{ $managers->links() }}
<a href="/">Go Back Home</a>
</div> --}}

@endsection
