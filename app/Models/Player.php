<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    // Define the fields that are allowed to be mass-assigned

    protected $fillable = [
        'id',
        'slug',
        'team_id',
        'name',
        'position',
        'date_of_birth',
        'country',
        'number',
        'Played',
        'Started',
        'Minutes',
        'goals',
        'assists',
        'own_goals',
        'penalties',
        'subbed_in',
        'subbed_out',
        'yellows',
        'yellow_red',
        'red'
        ];

    public function homeFixtures()
    {
        return $this->hasMany(Fixture::class, 'home_team_id');
    }
    public function awayFixtures()
    {
        return $this->hasMany(Fixture::class, 'away_team_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }


    protected function nextFixture(): Attribute
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
    
}
