@extends('layouts.base')

@section('content')
<div class="grid grid-cols-2 w-full, h-max padding text-white border margintop">
    
<x-fixturepreview />
    <div class=" ml-72"> 
        <div class="bordertop bg-darkgrey padding text "> LEAGUES </div> 
            <div class="borderbottom h-fit">
                <div class="pl-4 pt-4">
                    <div class="text hover:font-bold">
                        <a href="{{ route('leagues.view', ['id' => 1, 'slug' => '1']) }}"> PREMIER LEAGUE</a>
                    </div>
                        <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index')}}">TEAMS</a>
                            <span class="grey">|</span>
                            <a href="">FIXTURES</a>
                        </div>
                </div>

                <div class="pl-4 pt-4 ">
                    <div class="text hover:font-bold">
                        <a href="#">CHAMPIONS LEAGUE</a>
                    </div>
                        <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">TEAMS</a>
                            <span class="grey">|</span>
                            <a href="">FIXTURES</a>
                        </div>
                </div>

                <div class="pl-4 pt-4">
                    <div class="text hover:font-bold">
                        <a href="#">EUROPA LEAGUE</a>
                    </div>
                        <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">TEAMS</a>
                            <span class="grey">|</span>
                            <a href=""> FIXTURES</a>
                        </div>
                </div>

                <div class="pl-4 pt-4">
                    <div class="text hover:font-bold">
                        <a href="#"> BUNDESLIGA</a>
                    </div>
                        <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">TEAMS</a>
                            <span class="grey">|</span>
                            <a href="">FIXTURES</a>
                        </div>
                </div>

                <div class="pl-4 pt-4 pb-4">
                    <div class="text hover:font-bold">
                        <a href="#"> SERIE A</a>
                    </div>
                        <div class="text-xs orange hover:font-bold"><a href="{{ route('teams.index') }}">TEAMS</a>
                            <span class="grey">|</span>
                            <a href="">FIXTURES</a>
                        </div>
                </div>
            </div> 
    </div>

    <div class="">
        <div class="">
            <div class=" bordertop bg-darkgrey padding text heading"> TOP SEARCHED TEAMS </div>
            <div class=" grid grid-cols-2 subheading">
                <div class=" bg-darkgrey pl-4 text-sm smallpadding"> TEAM</div>
                <div class=" bg-darkgrey text-sm smallpadding "> LEAGUE</div>
                
                @foreach ($teams as $team)
                    <div class=""> {{ $team->name}} </div>
                    <div class=""> {{ $team->league->name}} </div>

                @endforeach
            
            </div>
        </div>
        <div class="margintop">
            <div class=" bordertop bg-darkgrey padding text heading"> TOP SEARCHED PLAYERS </div>
            <div class=" grid grid-cols-2 subheading">
                <div class=" bg-darkgrey pl-4 text-sm smallpadding"> PLAYER</div>
                <div class=" bg-darkgrey text-sm smallpadding">CLUB</div>
                
            </div>
        </div>
    </div>
</div>


@endsection