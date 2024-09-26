<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudyCase extends Model implements HasMedia
{
    use InteractsWithMedia, Searchable;

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

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class)->withTimestamps();
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)->withTimestamps();
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    // partner organisations
    public function organisations(): BelongsToMany
    {
        return $this->belongsToMany(Organisation::class)->withTimestamps();
    }

    public function communicationProducts(): HasMany
    {
        return $this->hasMany(CommunicationProduct::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    // for Spatie media library
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function toSearchableArray()
    {
        return [
            'geographic_area' => $this->geographic_area,
            'title' => $this->title,
            'year_of_development' => $this->year_of_development,
            'statement' => $this->statement,
            'target_audience' => $this->target_audience,
            'call_to_action' => $this->call_to_action,
            'target_audience_priorities_and_values' => $this->target_audience_priorities_and_values,
            'framing' => $this->framing,
            'strategy_to_argue' => $this->strategy_to_argue,
            'other_languages' => $this->other_languages,
        ];
    }
}