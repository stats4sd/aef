<?php

namespace App\Models;

use App\Models\Claim;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evidence extends Model
{
    protected $table = 'evidences';

    protected $guarded = ['id'];

    public function claim(): BelongsTo
    {
        return $this->belongsTo(Claim::class);
    }

    public function aspects(): HasMany
    {
        return $this->hasMany(Aspect::class);
    }

    public function evidenceAttachments(): HasMany
    {
        return $this->hasMany(EvidenceAttachment::class);
    }
}
