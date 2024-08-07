<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisation extends Model
{
    protected $table = 'organisations';

    protected $guarded = ['id'];

    public function leadingStudyCases(): HasMany
    {
        return $this->hasMany(StudyCase::class, 'leading_organisation_id', 'id');
    }

    public function partnerStudyCases(): HasMany
    {
        return $this->hasMany(StudyCase::class);
    }
}
