<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeniorTeam extends Model
{
    /** @use HasFactory<\Database\Factories\SeniorTeamFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'division',
        'photo',
    ];

    //n-n avec joueurs
    public function players() { 
        return $this->belongsToMany(Player::class, 'senior_team_players');
    }

    //n-n avec staff
    public function staff() { 
        return $this->belongsToMany(YoungTeam::class, 'staff');
    }

    //1-n avec actualites
    public function posts() { 
        return $this->hasMany(Post::class);
    }
}
