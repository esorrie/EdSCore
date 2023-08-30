<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    
    public function awayResults(): HasMany
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
                
                return $allresults->where('full_time_home', '!=',null);
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

    public function manager(): HasOne
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

    protected function tablePreview(): Attribute
    {
        $table = null;
        $teams = $this->league->first()->teams;


        foreach($teams as $team) {
            // Calculate additional statistics for each team (points and played games)
            $table[] = [
                'name' => ($team['name']),
                'played' => ($team['pivot']['won'] + $team['pivot']['drawn'] + $team['pivot']['lost']),
                'won' => ($team['pivot']['won']),
                'drawn' => ($team['pivot']['drawn']),
                'lost' => ($team['pivot']['lost']),
                'points' => ($team['pivot']['won'] * 3 + $team['pivot']['drawn']),
                'gd' => ($team['pivot']['gd']),
                'gf' => ($team['pivot']['gf']),
            ];
            
            $sortedPrev = collect($table)->sortBy([
                ['points', 'desc'],
                ['gd', 'desc'],
                ['gf', 'desc'],
            ]);
            
            // dd($sortedPrev);
        }

        
        return Attribute::make(
            get: function() use ($sortedPrev) {
                
                // dd($sortedPrev);     
                return $sortedPrev->take(5);
            }
        );
    }
}