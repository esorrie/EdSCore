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
  
  {{-- TODO: add this component to managers.view --}}