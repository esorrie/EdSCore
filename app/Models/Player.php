<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'date_of_birth',
        'country_of_origin',
        'languages_spoken',
        'position',
        'foot'
    ];
 
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    
}
