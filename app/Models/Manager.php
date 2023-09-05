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

    protected function tablePreview(): Attribute
    {
        $table = null;
        $teams = $this->team->league->first()->teams;


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