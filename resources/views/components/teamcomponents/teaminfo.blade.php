<div class="grid grid-cols-2">
    <div class="details">
      <div class="bordertop bg-darkgrey smallpadding text "> TEAM DETAILS</div>
        <div class="grid grid-cols-2 grid-rows-4 details">
          <div class="border text-sm text smallpadding"> MANAGER</div>
          <div class="border text-sm text smallpadding uppercase text-right"> {!! $team->manager->name !!}</div>
          <div class="border text-sm text smallpadding"> STADIUM</div>
          <div class="border text-sm text smallpadding uppercase text-right"> {!! $team->stadium !!}</div>
          <div class="border text-sm text smallpadding"> LOCATION</div>
          <div class="border text-sm text smallpadding uppercase text-right"> #</div>
          <div class="border text-sm text smallpadding"> NICKNAME</div>
          <div class="border text-sm text smallpadding uppercase text-right"> #</div>
        </div>
    </div>
    <div class=""><x-fixturepreview /></div>
  </div>

  {{-- TODO: add this component to teams.view --}}