<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    // Define the fields that are allowed to be mass-assigned

    protected $fillable = [
        'id',
        'slug',
        'name',
        'date_of_birth',
        'country',
        'position',
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
