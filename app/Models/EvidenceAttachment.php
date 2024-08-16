<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EvidenceAttachment extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'evidence_attachments';

    protected $guarded = ['id'];

    public function evidence(): BelongsTo
    {
        return $this->belongsTo(Evidence::class);
    }
}
