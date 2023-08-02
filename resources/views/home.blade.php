@extends('layouts.base')

@section('content')

<div class="margintop text-white uppercase">
    
    <div class="margintop flex">
        <div class="w-full">
            <x-card.card title="upcoming fixtures">
                <div class="borderbottom">
                    <div class="pt-4 text-xl text-center"> Premier league </div>
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
    
      
        <div class=" ml-5 w-6/12"> 
            <div class="bordertop bg-darkgrey padding text "> Leagues </div> 
                <div class="borderbottom h-fit">
                    <div class="pl-4 pt-4">
                        <div class="text hover:font-bold">
                            <a href="{{ route('leagues.view', ['id' => 2021, 'slug' => 'premier-league']) }}"> Premier League</a>
                        </div>
                            <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index')}}">Teams</a>
                                <span class="grey">|</span>
                                <a href="">Fixtures</a>
                            </div>
                    </div>

                    <div class="pl-4 pt-4 ">
                        <div class="text hover:font-bold">
                            <a href="#">Champions League</a>
                        </div>
                            <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">Teams</a>
                                <span class="grey">|</span>
                                <a href="">Fixtures</a>
                            </div>
                    </div>

                    <div class="pl-4 pt-4">
                        <div class="text hover:font-bold">
                            <a href="#"> La Liga</a>
                        </div>
                            <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">Teams</a>
                                <span class="grey">|</span>
                                <a href=""> Fixtures</a>
                            </div>
                    </div>

                    <div class="pl-4 pt-4">
                        <div class="text hover:font-bold">
                            <a href="#"> Bundesliga</a>
                        </div>
                            <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">Teams</a>
                                <span class="grey">|</span>
                                <a href="">Fixtures</a>
                            </div>
                    </div>

                    <div class="pl-4 pt-4 pb-4">
                        <div class="text hover:font-bold">
                            <a href="#"> Serie A</a>
                        </div>
                            <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">Teams</a>
                                <span class="grey">|</span>
                                <a href="">Fixtures</a>
                            </div>
                    </div>
                </div> 
        </div>
    </div>
    

    <div class="">
        <div class="w-840">
            <x-card.card title="Top Teams">
                <div class=" grid grid-cols-3 subheading">
                    <div class=" bg-darkgrey pl-4 text-sm smallpadding"> Team</div>
                    <div class=" bg-darkgrey pl-4 text-sm smallpadding"> Points</div>
                    <div class=" bg-darkgrey text-sm smallpadding "> League</div>
                     
                    

                </div>
            </x-card.card>

        </div>
        <div class="mt-12 w-840">
            <x-card.card title="Top Players">
                <div class=" grid grid-cols-3 subheading">
                    <div class=" bg-darkgrey pl-4 text-sm smallpadding"> Player</div>
                    <div class=" bg-darkgrey text-sm smallpadding">Goals</div>
                    <div class=" bg-darkgrey text-sm smallpadding">Club</div>
                    
                    

                </div>
            </x-card.card>
        </div>
    </div>
</div>


@endsection