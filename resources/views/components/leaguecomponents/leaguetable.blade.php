<div class="grid grid-cols-13 text jusitfy-between">
    <div class="border rounded-tl-lg bg-darkgrey smallpadding text">
        <div class=""> # </div>
    </div>
    <div class="border bg-darkgrey smallpadding text col-span-2">
        <div class=""> TEAM </div>
    </div>
    <div class="border bg-darkgrey smallpadding text ">
        <div class=""> PLAYED </div>
    </div>
    <div class="border bg-darkgrey smallpadding text ">
        <div class=""> WON </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> DRAWN </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> LOST </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> GF </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> GA </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> GD </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> POINTS </div>
    </div>
    <div class="border rounded-tr-lg bg-darkgrey smallpadding text col-span-2">
        <div class=""> NEXT OPP </div>
    </div>

    @foreach ($teams as $team) 
        <div class="smallpadding border text-sm"> #</div>      
        <div class="col-span-2 smallpadding border hover:bg-orange duration-500 uppercase text-sm"> {!! $team->name !!} </div>
        <div class="smallpadding border text-sm"> {{ $team->played }}</div>
        <div class="smallpadding border text-sm"> {{ $team->won }} </div>
        <div class="smallpadding border text-sm"> {{ $team->drawn }} </div>
        <div class="smallpadding border text-sm"> {{ $team->lost }} </div>
        <div class="smallpadding border text-sm"> {{ $team->played }} </div>
        <div class="smallpadding border text-sm"> {{ $team->played }} </div>
        <div class="smallpadding border text-sm"> {{ $team->played }} </div>
        <div class="smallpadding border text-sm"> {{ $team->played }} </div>
        <div class="col-span-2 smallpadding border hover:bg-orange duration-500 text-sm"> N/A </div>
    @endforeach
</div>
