<?php

namespace App\Models;

use App\Models\CommunicationProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StudyCase extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'study_cases';

    protected $guarded = ['id'];

    protected $casts = [
        'ready_for_review' => 'boolean',
        'reviewed' => 'boolean',
    ];

    // leading organisation
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    // partner organisations
    public function organisations(): BelongsToMany
    {
        return $this->belongsToMany(Organisation::class);
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

    // for Spatie media library
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
