<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\map;

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

    protected function weather(): Attribute
    {
        return Attribute::make(
            get: function() {
                $currentWeather = Cache::remember(sprintf('team.%s.location.weather', $this->id), 60, function() {
                    Log::info('Collecting Live Data From API');
                    return Http::get('https://api.open-meteo.com/v1/forecast', [
                        'latitude' => $this->lat,
                        'longitude' => $this->lng,
                        'hourly' => 'temperature_2m',
                        'current_weather' => 'true'
                    ])->json('current_weather');
                });
                return $currentWeather;
            }
        );
    }
    
}
