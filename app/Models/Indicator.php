<?php

namespace App\Models;

use App\Models\Evidence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Indicator extends Model
{
    protected $table = 'indicators';

    protected $guarded = ['id'];

    public function evidences(): HasMany
    {
        return $this->hasMany(Evidence::class);
    }
}
