<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'slug',
        'name',
        'emblem',
        'location'
    ];
    
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'standings', 'league_id', 'team_id')->withPivot([
            'won',
            'lost',
            'drawn',
            'gf',
            'ga',
            'gd'
        ])
        ->orderByPivot('points', 'desc');

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

    // protected function currentTable(): Attribute
    // {
    //     return Attribute::make(
    //         get: function() {

    //             $currentStandings = $this->teams()->getPivotColumns(
    //                 'won',
    //                 'lost',
    //                 'drawn',
    //                 'gf',
    //                 'ga',
    //                 'gd'
    //             );

    //             return $currentStandings;
    //         }
    //     );
    // }
    
};

    
