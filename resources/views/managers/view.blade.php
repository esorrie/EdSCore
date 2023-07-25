@extends('layouts.base')

@section('content')

<div class="manageroverview">
  <div class="managercard">
    <div class="managername"> {!! $manager->name !!}</a> </div>
      <div class="managerteam"> <span class="orange"> {!! $manager->team->name !!} </span> <span class="grey"> | </span> MANAGER</div>
  </div>  
</div>

<div class="">
  <div class="details margintop">
    <div class="bg-darkgrey bordertop padding text">PERSONAL DETAILS</div>
    <div class="grid grid-cols-2 grid-rows-5 details">
      <div class="border text-sm text smallpadding"> NATIONALITY</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {{ $manager->country_of_origin }}</div>
        <div class="border text-sm text smallpadding"> DATE OF BRIRTH</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {{ $manager->date_of_birth }}</div>
        <div class="border text-sm text smallpadding"> HEIGHT</div>
        <div class="border text-sm text smallpadding uppercase text-right"> #</div>
        <div class="border text-sm text smallpadding"> NICKNAME</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {{ $manager->nickname }}</div>
        <div class="border text-sm text smallpadding"> SEASONS</div>
        <div class="border text-sm text smallpadding uppercase text-right"> {{ $manager->seasons }}</div>
    </div>
  </div>
</div>

<div class="details text margintop">
  <div class="bordertop bg-darkgrey smallpadding text">LEAGUE</div>
    <div class="border bg-darkgrey text grid grid-cols-10">
      <div class="col-span-5 smallpadding"> TEAM</div>
      <div class="self-center smallpadding"> P</div>
      <div class="self-center smallpadding"> W</div>
      <div class="self-center smallpadding"> D</div>
      <div class="self-center smallpadding"> L</div>
      <div class="self-center smallpadding"> PTS</div>
    </div>

    <div class="uppercase text-sm">
      <div class="grid grid-rows-5">
        <div class="grid grid-cols-10 border">
            @foreach ($teams as $team)
            <div class="col-span-5 border smallpadding"> {{ $team->name }}</div>
              <div class="border smallpadding"> #</div>
              <div class="border smallpadding"> #</div>
              <div class="border smallpadding"> #</div>
              <div class="border smallpadding"> #</div>
              <div class="border smallpadding"> #</div>
            @endforeach
          </div>
        </div>
    </div>

</div>
@endsection

