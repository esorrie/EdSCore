@extends('layouts.base')

@section('content')

<div class="managernav">
  <div class="managersdisplay"> MANAGERS</div>
      <div class="card_searchbar">
          <input type="text" placeholder="Search...">
      </div>
</div>

<div class="managertableheader">
  <div class="managerheader"> MANAGER</div>
  <div class="teamheader"> TEAM</div>
</div>

@foreach ($managers as $manager)
    <div class="managertablecontents">
        <div class="managername">
            <a href="/managers/{{ $manager->id }}/{{ $manager->slug }}">
                {!! $manager->name !!}
            </a>
        </div>
        <p>
            Team: {{ $manager->team->name }}
        </p>
        <div class="teamname"> {!! $manager->team->name !!} </div> 
    </div>
@endforeach

<div class="pagination">
{{ $managers->links() }}
<a href="/">Go Back Home</a>
</div>

@endsection
