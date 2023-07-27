@extends('layouts.base')

@section('content')

<x-managercomponents.overview :manager="$manager"/>


<div class="">
  <div class="flex">
    <div class="details margintop">
      <x-card.card title="Manger Details">
        <x-table.table :tableData="$managerTableData"/>
      </x-card.card>
    </div>
    <div class="text-white w-full margintop ml-20">
      <x-card.card title="upcoming fixtures">
          <div class="borderbottom">
              <div class="pt-4 text-xl text-center"> PREMIER LEAGUE </div>
              <div class="padding text uppercase">
                  <div class="text-center text-2xl font-bold"> Newcastle United </div> 
                  <div class="text-center orange font-bold"> vs </div>
                  <div class="text-center text-2xl font-bold"> Manchester United </div>
                  <div class="text-center orange"> 26/07</div>
                  <div class="text-center orange"> 12:30</div>
              </div>    
          </div>  
      </x-card.card>
    </div>

  </div>
</div>

<div class="flex jusitfy-evenly">

    <div class="details">
      <x-table.leaguetablepreview :teams="$teams"/>
    </div>

    <div class="w-full ml-20">
      <div class="margintop text uppercase">
        <div class="bordertop bg-darkgrey smallpadding  "> Season STATS</div>
          <div class="grid grid-cols-13 text-xs">
            <div class="border bg-darkgrey smallpadding col-span-2"> date </div>
            <div class="border bg-darkgrey smallpadding col-span-2"> opp </div>
            <div class="border bg-darkgrey smallpadding"> result </div>
            <div class="border bg-darkgrey smallpadding"> g </div>
            <div class="border bg-darkgrey smallpadding"> conc </div>
            <div class="border bg-darkgrey smallpadding"> s </div>
            <div class="border bg-darkgrey smallpadding"> s </div>
            <div class="border bg-darkgrey smallpadding "> xg </div>
            <div class="border bg-darkgrey smallpadding"> xa </div>
            <div class="border bg-darkgrey smallpadding"> xga </div>
            <div class="border bg-darkgrey smallpadding"> xaa </div>
            <div class="border smallpadding col-span-2"> 26/07/23</div>
            <div class="border smallpadding col-span-2"> sunderland</div>
            <div class="border smallpadding"> 12-0 </div>
            <div class="border smallpadding"> 3</div>
            <div class="border smallpadding"> 2</div>
            <div class="border smallpadding"> 23</div>
            <div class="border smallpadding"> 5</div>
            <div class="border smallpadding"> 2.4</div>
            <div class="border smallpadding"> 1.1</div>
            <div class="border smallpadding"> 0.6</div>
            <div class="border smallpadding"> 0.7</div>
          </div>
      </div> 
    </div>
</div>
@endsection

