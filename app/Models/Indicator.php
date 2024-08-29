<?php

namespace App\Models;

use App\Models\Claim;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Indicator extends Model
{
    protected $table = 'indicators';

    protected $guarded = ['id'];

    public function evidence(): BelongsTo
    {
        return $this->belongsTo(Evidence::class);
    }
}
