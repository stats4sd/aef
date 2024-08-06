<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $table = 'teams';

    protected $guarded = ['id'];

    public function studyCases(): HasMany
    {
        return $this->hasMany(StudyCase::class);
    }
}
