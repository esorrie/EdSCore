<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'home_team_id',
        'away_team_id',
        'home_team_slug',
        'away_team_slug',
        'home_team',
        'away_team',
        'half_time_home',
        'half_time_away',
        'full_time_home',
        'full_time_away',
        'referee',
        'league_id',
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
