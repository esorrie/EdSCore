<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'established',
    ];
    
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     *  
     * Count total teams per league
     * 
     */
    
     protected function totalTeams(): Attribute
     {
        return Attribute::make(
            get: function() {

                $teamCount = $this->teams()->count();

                return $teamCount;
            }
        );
    }

    protected function premLeague(): Attribute
    {
        return Attribute::make(
            get: function() {
                $leaguestandings = Cache::remember(sprintf('league.%s.standings', $this->id), 60, function() {
                    Log::info('Collecting Football Data From API');
                    $response =  Http::withHeader("X-Auth-Token", "b7173c63c2084739b77c6fe4cb8bf7f0" )->get('http://api.football-data.org/v4/competitions/PL/standings', [
                        'id' => 'PL',
                        'standings' => '2021'
                    ])->json('standings');

                    dd($response);
                });
                // dd($leaguestandings);
                return $leaguestandings;
            }
        );
    }
};

    
