<div class="grid grid-cols-13 text jusitfy-between uppercase">
    <div class="border rounded-tl-lg bg-darkgrey smallpadding text">
        <div class=""> # </div>
    </div>
    <div class="border bg-darkgrey smallpadding text col-span-2">
        <div class=""> team </div>
    </div>
    <div class="border bg-darkgrey smallpadding text ">
        <div class=""> played </div>
    </div>
    <div class="border bg-darkgrey smallpadding text ">
        <div class=""> won </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> drawn </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> lost </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> gf </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> ga </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> gd </div>
    </div>
    <div class="border bg-darkgrey smallpadding text">
        <div class=""> points </div>
    </div>
    <div class="border rounded-tr-lg bg-darkgrey smallpadding text col-span-2">
        <div class=""> next opp </div>
    </div>
    
    @foreach ($teams as $team) 
        <div class="smallpadding border text-sm"> #</div>      
        <div class="col-span-2 smallpadding border hover:bg-orange duration-500 text-sm"> {!! $team->name !!} </div>
        <div class="smallpadding border text-sm"> {{ $team->played }}</div>
        <div class="smallpadding border text-sm"> {{ $team->pivot->won }} </div>
        <div class="smallpadding border text-sm"> {{ $team->pivot->drawn }} </div>
        <div class="smallpadding border text-sm"> {{ $team->pivot->lost }} </div>
        <div class="smallpadding border text-sm"> {{ $team->pivot->gf }} </div>
        <div class="smallpadding border text-sm"> {{ $team->pivot->ga }} </div>
        <div class="smallpadding border text-sm"> {{ $team->pivot->gd }} </div>
        <div class="smallpadding border text-sm"> {{ $team->played }} </div>
        <div class="col-span-2 smallpadding border hover:bg-orange duration-500 text-sm"> N/A </div>
    @endforeach
</div>
