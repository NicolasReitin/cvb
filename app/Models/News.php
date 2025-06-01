<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'author',
        'photo',
    ];

    public function senior_teams(): BelongsTo
    {
        return $this->belongsTo(SeniorTeam::class);
    }

    public function young_teams(): BelongsTo
    {
        return $this->belongsTo(YoungTeam::class);
    }
}
