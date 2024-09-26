<?php

namespace App\Models;

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

    protected static function booted()
    {
        // StudyCase has master detail relationship with CommunicationProduct, Photo and EvidenceAttachment.
        //
        // When user delete a StudyCase record, related records for CommunicationProduct, Photo and EvidenceAttachment
        // are deleted by database constraint onCascadeDelete().
        //
        // This works well in database level, but it is not desired in cloud storage level.
        // The uploaded files for these models remain in S3 cloud storage.
        //
        // There is no event to trigger to delete them, they will remain in cloud storage forever.
        // This will introduce extra cost for paying cloud storage space that contains files which should be deleted but still remain.
        //
        // To avoid this happen, we can remove related models to trigger model event delete() to delete the uploaded files in S3 cloud storage.
        //
        // P.S. It may take a few seconds to delete all related detail records. The modal popup for Delete confirmation remains showing
        // on screen for a longer time than usual. We may consider to put below tasks into a queue to retain the responsiveness
        // of Delete confirmation modal popup.

        static::deleting(function ($item) {
            foreach ($item->communicationProducts as $communicationProduct) {
                $communicationProduct->delete();
            }

            foreach ($item->photos as $photo) {
                $photo->delete();
            }

            foreach ($item->claims as $claim) {
                foreach ($claim->evidences as $evidence) {
                    foreach ($evidence->evidenceAttachments as $evidenceAttachment) {
                        $evidenceAttachment->delete();
                    }
                }
            }
        });
    }

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
}
