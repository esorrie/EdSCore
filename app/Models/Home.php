<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    public function league(): HasMany
    {
        return $this->hasMany(League::class, 'standings', 'team_id','league_id')->withPivot([
            'won',
            'lost',
            'drawn',
            'gf',
            'ga',
            'gd'
        ]);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'standings', 'team_id','league_id')->withPivot([
            'won',
            'lost',
            'drawn',
            'gf',
            'ga',
            'gd'
        ]);
    }
}