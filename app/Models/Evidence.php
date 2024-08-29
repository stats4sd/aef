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

    public function indicators(): HasMany
    {
        return $this->hasMany(Indicator::class);
    }

    public function evidenceAttachments(): HasMany
    {
        return $this->hasMany(EvidenceAttachment::class);
    }
}
