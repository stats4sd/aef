<?php

namespace App\Models;

use App\Models\CommunicationProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyCase extends Model
{
    protected $table = 'study_cases';

    protected $guarded = ['id'];

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    // leading organisation
    public function leadingOrganisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class, 'leading_organisation_id', 'id');
    }

    // partner organisations
    public function partnerOrganisations(): HasMany
    {
        return $this->hasMany(Organisation::class);
    }

    public function communicationProducts(): HasMany
    {
        return $this->hasMany(CommunicationProduct::class);
    }

    public function references(): HasMany
    {
        return $this->hasMany(Reference::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Reference::class);
    }
}
