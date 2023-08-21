<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // Define the fields that are allowed to be mass-assigned
    protected $fillable = [
        'id',
        'name',
        'slug',
        'crest',
        'founded',
        'stadium',
        'location',
        'league_id',
        'manager',
        'played',
        'won',
        'drawn',
        'lost',
        'points',
        'GA',
        'GF',
        'GD',
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
    
    public function homeFixtures()
    {

        return $this->hasMany(Fixture::class, 'home_team_id');
    }
    
    public function awayFixtures()
    {
        return $this->hasMany(Fixture::class, 'away_team_id');
    }
    public function homeResults()
    {

        return $this->hasMany(Fixture::class, 'home_team_id');
    }
    
    public function awayResults()
    {
        return $this->hasMany(Fixture::class, 'away_team_id');
    }

    public function league()
    {
        return $this->belongsToMany(League::class, 'standings', 'team_id','league_id')->withPivot([
            'won',
            'lost',
            'drawn',
            'gf',
            'ga',
            'gd'
        ]);
    }
    
    protected function allFixture(): Attribute
    {
        return Attribute::make(
            get: function(){
                
                $homefixtures = $this->homeFixtures;
                $awayfixtures = $this->awayFixtures;
                $allfixtures = $homefixtures->merge($awayfixtures)->sortBy(function ($fixture){ 
                    return Carbon::createFromFormat('d/m/y H:i', $fixture['date'])->timestamp;
                });
                // dd($allfixtures);
                return $allfixtures->where('full_time_home', null);
            }
        );
    }

    protected function allResult(): Attribute
    {
        return Attribute::make(
            get: function(){
                
                $homeresults = $this->homeResults;
                $awayresults = $this->awayResults;
                $allresults = $homeresults->merge($awayresults)->sortBy(function ($result){ 
                    return Carbon::createFromFormat('d/m/y H:i', $result['date'])->timestamp;
                });
                // dd($allresults);
                return $allresults->where('full_time_home', !null);
            }
        );
    }

    protected function nextFixture(): Attribute
    {
        return Attribute::make(
            get: function(){
                
                $allfixtures = $this->allFixture;

                return $allfixtures->where('full_time_home', null)->first();
            }
        );
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    protected function totalPlayers(): Attribute
    {
        return Attribute::make(
            get: function(){

                $playerCount = $this->players()->count();

                return $playerCount;
            }
        );
    }
    
}
