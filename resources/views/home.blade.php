@extends('layouts.base')

@section('content')

<div class="margintop text-white uppercase">
    
    <div class="flex">
        <div class="w-full">
            <div class="">
                <x-card.card title="upcoming fixtures">
                    <div class="borderbottom text">
                        <div class="pt-4 text-xl text-center"></div>
                        <div class="padding  uppercase">
                            <div class="text-center text-2xl font-bold"> <a href="/teams/{{ $fixture->home_team_id}}/ {{ $fixture->home_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $fixture->home_team_crest }}"> {{ $fixture->home_team }} </a> </div>
                            <div class="text-center orange font-bold"> vs </div>
                            <div class="pt-2 text-center text-2xl font-bold"> <a href="/teams/{{ $fixture->away_team_id}}/ {{ $fixture->away_team_slug}}"> <img style="width:50px;height:50px;" src="{{ $fixture->away_team_crest }}">{{ $fixture->away_team }} </a> </div>
                            <div class="text-center orange"> {{ $fixture->date }} </div>
                        </div>    
                    </div>   
                </x-card.card>
            </div>
        </div>
    
        <div class=" ml-5 w-6/12"> 
            <div class="bordertop bg-darkgrey padding text "> Leagues </div> 
                <div class="borderbottom h-fit">
                    <div class="pl-4 pt-4">
                        <div class="text hover:font-bold">
                            <a href="{{ route('leagues.view', ['id' => 2021, 'slug' => 'premier-league']) }}"> Premier League</a>
                        </div>
                            <div class="text-xs orange hover:font-bold"><a href="{{ route('leagues.teams', ['id' => 2021, 'slug' => 'premier-league'])}}">Teams</a>
                                <span class="grey">|</span>
                                <a href="{{ route('leagues.fixtures', ['id' => 2021, 'slug' => 'premier-league'])}}">Fixtures</a>
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
                    <div class=" bg-darkgrey text-sm smallpadding"> Points</div>
                    <div class=" bg-darkgrey text-sm smallpadding "> League</div>
                     
                    

                </div>
            </x-card.card>

        </div>
        <div class="mt-12 w-840">
            <x-card.card title="Top Players">
                <div class=" grid grid-cols-3 subheading">
                    <div class=" bg-darkgrey pl-4 text-sm smallpadding"> Player</div>
                    <div class=" bg-darkgrey text-sm smallpadding"> Goals</div>
                    <div class=" bg-darkgrey text-sm smallpadding"> Club</div>
                    
                    

                </div>
            </x-card.card>
        </div>
    </div>
</div>


@endsection