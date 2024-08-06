<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    public function studyCases(): HasMany
    {
        return $this->hasMany(StudyCase::class);
    }
}
