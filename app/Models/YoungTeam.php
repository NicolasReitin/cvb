<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YoungTeam extends Model
{
    /** @use HasFactory<\Database\Factories\YoungTeamFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'division',
        'photo',
    ];

    //n-n avec joueurs
    public function players() { 
        return $this->belongsToMany(Player::class, 'young_team_players');
    }

    //n-n avec staff
    public function staff() { 
        return $this->belongsToMany(SeniorTeam::class, 'staff');
    }

    //1-n avec actualites
    public function news() { 
        return $this->hasMany(News::class);
    }
}
