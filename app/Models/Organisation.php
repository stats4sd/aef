<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Organisation extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'organisations';

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        parent::booted();

        // find and assign team_id value before creating new record
        static::creating(static function ($organisation) {
            $organisation->team_id = auth()->user()->latestTeam->id;
        });
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function studyCases(): BelongsToMany
    {
        return $this->belongsToMany(StudyCase::class)->withTimestamps();
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
