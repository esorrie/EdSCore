<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'league_id',
        'match_id',
        'home_team_id',
        'away_team_id',
        'home_team_slug',
        'away_team_slug',
        'home_team',
        'away_team',
        'home_team_crest',
        'away_team_crest',
        'half_time_home',
        'half_time_away',
        'full_time_home',
        'full_time_away',
        'referee',
    ];

    public function league()
    {
        return $this->belongsToMany(League::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
