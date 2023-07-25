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

{{-- TODO: add this component to manager.view and team.view --}}