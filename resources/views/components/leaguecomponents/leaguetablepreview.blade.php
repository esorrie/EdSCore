<div class="details text margintop">
  <x-card.card title="League">
    <div class="border bg-darkgrey text grid grid-cols-9 uppercase">
      <div class="col-span-3 smallpadding"> team </div>
      <div class="self-center smallpadding"> p </div>
      <div class="self-center smallpadding"> w </div>
      <div class="self-center smallpadding"> d </div>
      <div class="self-center smallpadding"> l </div>
      <div class="self-center smallpadding"> gd </div>
      <div class="self-center smallpadding"> pts </div>
    </div>

    <div class="uppercase text-sm">
      <div class="">
        <div class="grid grid-cols-9 border grid-rows-5">
          {{-- {{dd($team->tablePreview)}} --}}
            @foreach ($team->tablePreview as $team)
              <div class="col-span-3 border smallpadding hover:bg-orange duration-500"> {{ $team['name'] }} </a> </div>
              <div class="smallpadding border text-sm"> {{ $team['played'] }} </div>    
              <div class="smallpadding border text-sm"> {{ $team['pivot']['won'] }} </div>
              <div class="smallpadding border text-sm"> {{ $team['pivot']['drawn'] }} </div>
              <div class="smallpadding border text-sm"> {{ $team['pivot']['lost'] }} </div>
              <div class="smallpadding border text-sm"> {{ $team['pivot']['gd'] }} </div>
              <div class="smallpadding border text-sm"> {{ $team['points'] }} </div>
            @endforeach
        </div>
      </div>
    </div>   
  </x-card.card>
</div>
