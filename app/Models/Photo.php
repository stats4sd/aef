<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Photo extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'photos';

    protected $guarded = ['id'];

    public function studyCase(): BelongsTo
    {
        return $this->belongsTo(StudyCase::class);
    }
}