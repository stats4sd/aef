<?php

namespace App\Models;

use App\Models\Indicator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evidence extends Model
{
    protected $table = 'evidences';

    protected $guarded = ['id'];

    public function indicators(): HasMany
    {
        return $this->hasMany(Indicator::class);
    }
}
