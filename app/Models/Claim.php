<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claim extends Model
{
    public function studyCase(): BelongsTo
    {
        return $this->belongsTo(StudyCase::class);
    }

    public function evidences(): HasMany
    {
        return $this->hasMany(Evidence::class);
    }
}
