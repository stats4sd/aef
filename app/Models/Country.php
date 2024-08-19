<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    protected $table = 'countries';

    protected $guarded = ['id'];

    public function studyCases(): BelongsToMany
    {
        return $this->belongsToMany(StudyCase::class)->withTimestamps();
    }
}
