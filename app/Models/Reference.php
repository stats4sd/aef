<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reference extends Model
{
    public function studyCase(): BelongsTo
    {
        return $this->belongsTo(StudyCase::class);
    }
}
