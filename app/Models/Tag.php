<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $table = 'tags';

    protected $guarded = ['id'];

    public function studyCases(): BelongsToMany
    {
        return $this->belongsToMany(StudyCase::class)->withTimestamps();
    }
}
