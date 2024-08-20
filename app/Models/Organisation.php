<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organisation extends Model
{
    protected $table = 'organisations';

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        parent::booted();

        // find and assign team_id value before creating new record
        static::creating(static function ($organisation) {
            $organisation->team_id = auth()->user()->latestTeam->id;
        });
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function studyCases(): BelongsToMany
    {
        return $this->belongsToMany(StudyCase::class)->withTimestamps();
    }
}
