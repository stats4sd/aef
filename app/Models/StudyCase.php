<?php

namespace App\Models;

use App\Models\CommunicationProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyCase extends Model
{
    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    // partner organisations
    public function organisations(): HasMany
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
