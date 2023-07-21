@extends('layouts.base')

@section('content')

<div class="manageroverview">
  <div class="managercard">
    <div class="managername"> {!! $manager->name !!}</a> </div>
      <div class="managerteam"> <span class="orange"> {!! $manager->team->name !!} </span> <span class="grey"> | </span> MANAGER</div>
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
      {{ $manager->country_of_origin }}
    </p>
  </div>
  <div class="personalinfo">
    <p>
      Date of Birth:
    </p>
    <p>
      {{ $manager->date_of_birth }}
    </p>
  </div>
</div>
@endsection

