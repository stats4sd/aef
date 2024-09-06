<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    protected $table = 'teams';

    protected $guarded = ['id'];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_members')
            ->withPivot('is_admin')
            ->wherePivot('is_admin', 0);
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    public function studyCases(): HasMany
    {
        return $this->hasMany(StudyCase::class);
    }

    public function organisations(): HasMany
    {
        return $this->hasMany(Organisation::class);
    }
}
