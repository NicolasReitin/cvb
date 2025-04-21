<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'photo',
        'senior_team_id',
        'young_team_id',
    ];

    public function equipe_senior(): BelongsTo
    {
        return $this->belongsTo(SeniorTeam::class);
    }

    public function equipe_jeune(): BelongsTo
    {
        return $this->belongsTo(YoungTeam::class);
    }
}
