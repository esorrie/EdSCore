@extends('layouts.base')

@section('content')

<div class="playeroverview">
  <div class="playercard">
    <div class="playername"> {!! $player->name !!}</a> </div>
      <div class="playerteam"> <span class="orange"> {!! $player->team->name !!} </span> <span class="grey"> | </span> {!! $player->position !!} </div>
  </div>  
</div>
<div class="personaltable">
  <div class="personalheader">PERSONAL DETAILS</div>
</div>
<div class="personalcontents">
  <div class="personalinfo">
    <p>
      Nationality:
    </p>
    <p> 
      {{ $player->country_of_origin }}
    </p>
  </div>
  <div class="personalinfo">
    <p>
      Date of Birth:
    </p>
    <p>
      {{ $player->date_of_birth }}
    </p>
  </div>
  <div class="personalinfo">
    <p>
      HEIGHT:
    </p>
    <p>
      #
    </p>
  </div>
  <div class="personalinfo">
    <p>
      NUMBER:
    </p>
    <p>
      #
    </p>
  </div>
  <div class="personalinfo">
    <p>
      NICKNAME:
    </p>
    <p>
      {{ $player->nickname }}
    </p>
  </div>

</div>


  <a href="/players">Go Back to players</a>

@endsection