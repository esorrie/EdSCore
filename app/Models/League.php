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
        'id',
        'slug',
        'name',
        'emblem',
        'location'
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
    
};

    
