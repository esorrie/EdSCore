<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}