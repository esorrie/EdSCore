<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;
    
    // Define the fields that are allowed to be mass-assigned
    protected $fillable = [
        'id',
        'slug',
        'name',
        'emblem',
        'location',
        'country_flag'
    ];

    public function fixtures()
    {
        return $this->hasMany(Fixture::class);
    }
    public function managers()
    {
        return $this->hasMany(Manager::class);
    }
    
    // Define the many-to-many relationship with the 'Team' model through the 'standings' table
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'standings', 'league_id', 'team_id')->withPivot([
            'won',
            'lost',
            'drawn',
            'gf',
            'ga',
            'gd'
        ]);
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
                // Get the count of teams associated with this league
                $teamCount = $this->teams()->count();

                return $teamCount;
            }
        );
    }

    public function currentTable(): Attribute
    {
        $table = null;

        // Get the teams associated with this league
        $teams = $this->teams;

        foreach($teams as $team) {
            // Calculate additional statistics for each team (points and played games)
            $standing = [
                ...$team->toArray(), 
                'points' => ($team['pivot']['won'] * 3 + $team['pivot']['drawn']),
                'played' => ($team['pivot']['won'] + $team['pivot']['drawn'] + $team['pivot']['lost']),
                'gd' => ($team['pivot']['gd']),
                'gf' => ($team['pivot']['gf'])
            ];

            $table[] = $standing;
            
        }
        
        // Sort the table by points in descending order
        $sortedTable = collect($table)->sortBy([
            ['points', 'desc'],
            ['gd', 'desc'],
            ['gf', 'desc'],
        ]);

        return Attribute::make(
            get: function() use ($sortedTable) {
                
                return $sortedTable;
            }
        );
    }
};