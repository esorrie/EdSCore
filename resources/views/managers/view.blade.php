@extends('layouts.base')

@section('content')

<div class="manageroverview">
  <div class="managercard">
    <div class="managername"> {!! $manager->name !!}</a> </div>
      <div class="managerteam"> <span class="orange"> {!! $manager->team->name !!} </span> <span class="grey"> | </span> MANAGER</div>
  </div>  
</div>

<div class="flex justify-evenly margintop">
  <div class="grid grid-cols-2">
    <div class="details">
      <x-card.card title="Manger Details">
        <x-table.table :tableData="$managerTableData"/>
      </x-card.card>
    </div>
  </div>

  <div class="details text">
    <div class="bordertop bg-darkgrey smallpadding text">LEAGUE</div>
      <div class="border bg-darkgrey text grid grid-cols-9">
        <div class="col-span-4 smallpadding"> TEAM</div>
        <div class="self-center smallpadding"> P</div>
        <div class="self-center smallpadding"> W</div>
        <div class="self-center smallpadding"> D</div>
        <div class="self-center smallpadding"> L</div>
        <div class="self-center smallpadding"> PTS</div>
      </div>

      <div class="uppercase text-sm">
        <div class="">
          <div class="grid grid-cols-9 border grid-rows-5">
              @foreach ($teams as $team)
              <div class="col-span-4 border smallpadding hover:bg-darkgrey duration-500"> <a href="/teams/{{ $team->id }}/{{ $team->slug }}"> {!! $team->name !!} </a></div>
                <div class="border smallpadding"> {{ $team->played }}</div>
                <div class="border smallpadding"> {{ $team->won }}</div>
                <div class="border smallpadding"> {{ $team->drawn }}</div>
                <div class="border smallpadding"> {{ $team->lost }}</div>
                <div class="border smallpadding"> {{ $team->played }}</div>
              @endforeach
            </div>
          </div>
        </div>
      <div class="details margintop ">
        <div class="bordertop bg-darkgrey smallpadding text">GAME STATS</div>
      </div>    
  </div>
</div>
@endsection

