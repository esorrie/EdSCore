<div class="text font-bold text-3xl uppercase">fixtures</div>

<div class="margintop text">
  <div class="grid grid-cols-6 border  uppercase">
    <div class="border smallpadding bg-darkgrey"> date </div>
    <div class="border smallpadding bg-darkgrey col-span-2"> match </div>
    <div class="border smallpadding bg-darkgrey"> half time score  </div>
    <div class="border smallpadding bg-darkgrey"> Full time score  </div>
    <div class="border smallpadding bg-darkgrey"> referee  </div>

    @foreach ($team->allResult->reverse() as $result)
    <div class="border smallpadding orange"> {{ $result->date }} </div>
            <div class="col-span-2 border smallpadding  hover:bg-orange duration-500">
                <a href="/teams/{{ $result->home_team_id}}/ {{ $result->home_team_slug}}"> {{ $result->home_team }} </a>
                vs 
                <a href="/teams/{{ $result->away_team_id}}/ {{ $result->away_team_slug}}"> {{ $result->away_team }} </a>
            </div>
            <div class="border smallpadding"> {{ $result->half_time_home }} - {{ $result->half_time_away }} </div>
            <div class="border smallpadding"> {{ $result->full_time_home }} - {{ $result->full_time_away }} </div>
            <div class="border smallpadding orange"> {{ $result->referee }} </div>
    @endforeach

  </div>
</div>