<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claim extends Model
{
    protected $table = 'claims';

    protected $guarded = ['id'];

    protected static function booted()
    {
        // fill in team_id when a new claim record is being created
        static::creating(function ($item) {
            $item['team_id'] = auth()->user()->latestTeam->id;;
        });
    }

    // leading organisation
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function studyCase(): BelongsTo
    {
        return $this->belongsTo(StudyCase::class);
    }

    public function evidences(): HasMany
    {
        return $this->hasMany(Evidence::class);
    }
}
