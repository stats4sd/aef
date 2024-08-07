<?php

namespace App\Models;

use App\Models\StudyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunicationProduct extends Model
{
    protected $table = 'communication_products';

    protected $guarded = ['id'];

    public function studyCase(): BelongsTo
    {
        return $this->belongsTo(StudyCase::class);
    }
}
