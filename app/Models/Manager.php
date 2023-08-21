<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    // Define the fields that are allowed to be mass-assigned
    protected $fillable = [
        'id',
        'name',
        'slug',
        'date_of_birth',
        'country',
        'contract_start',
        'contract_end',
        'team_id',
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

    public function players()
    {
        return $this->hasMany(Player::class);
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