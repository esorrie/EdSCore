<div class="details text margintop">
  <x-card.card title="League">
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
            <div class="col-span-4 border smallpadding hover:bg-orange duration-500"> <a href="/teams/{{ $team->id }}/{{ $team->slug }}"> {{ $team->name }} </a></div>
              <div class="border smallpadding"> {{ $team->played }}</div>
              <div class="border smallpadding"> {{ $team->won }}</div>
              <div class="border smallpadding"> {{ $team->drawn }}</div>
              <div class="border smallpadding"> {{ $team->lost }}</div>
              <div class="border smallpadding"> {{ $team->points }}</div>
            @endforeach
        </div>
      </div>
    </div>   
  </x-card.card>
</div>