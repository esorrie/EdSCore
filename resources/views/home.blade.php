@extends('layouts.base')

@section('content')

<div class="overview">
    <div class="cardshome"></div>
        <div class="leaguescard"> LEAGUES 
            <div class="premcard">
                <a href="{{ route('leagues.view', ['id' => 1, 'slug' => '1']) }}"> PREMIER LEAGUE</a>
                <div class="premteams"><a href="{{ route('teams.index')}}"><span class="orange"> TEAMS</span></a>
                    <span class="grey">| |</span>
                    <a href=""><span class="orange"> FIXTURES</span></a>
                </div>
            </div>
            <div class="champscard">
                <a href="#">CHAMPIONS LEAGUE</a>
                <div class="champsteams"><a href="{{ route('teams.index') }}"><span class="orange"> TEAMS</span></a>
                    <span class="grey">| |</span>
                    <a href=""><span class="orange"> FIXTURES</span></a>
                </div>
            </div>
            <div class="europacard">
                <a href="#">EUROPA LEAGUE</a>
                <div class="europateams"><a href="{{ route('teams.index') }}"><span class="orange"> TEAMS</span></a>
                    <span class="grey">| |</span>
                    <a href=""><span class="orange"> FIXTURES</span></a>
                </div>
            </div>
            <div class="bundescard">
                <a href="#"> BUNDESLIGA</a>
                <div class="bundesteams"><a href="{{ route('teams.index') }}"><span class="orange"> TEAMS</span></a>
                    <span class="grey">| |</span>
                    <a href=""><span class="orange"> FIXTURES</span></a>
                </div>
            </div>
            <div class="serieacard">
                <a href="#"> SERIE A</a>
                <div class="serieateams"><a href="{{ route('teams.index') }}"><span class="orange"> TEAMS</span></a>
                    <span class="grey">| |</span>
                    <a href=""><span class="orange"> FIXTURES</span></a>
                </div>
            </div>
        </div>     
        <div class="nextgamescard"> UPCOMING FIXTURES</div>
        <div class="fixturescard"> PREMIER LEAGUE

        </div>
        <div class="popularcard"> TOP SEARCHED TEAMS</div>
        <div class="popularteamcard">
            #
        </div>
        <div class="popularcard"> TOP SEARCHED PLAYERS
        </div>
        <div class="popularplayercard">
            #
        </div>
        <div class="topmanagers"> TOP MANAGER</div>
        <div class="topmanagercard">
            #
        </div>
    </div>
</div>

@endsection