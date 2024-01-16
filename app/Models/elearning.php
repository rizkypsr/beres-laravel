<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class elearning extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'elearnings';

    public function challenge(): BelongsTo
    {
        return $this->belongsTo(challenges::class, 'challenge_id')->withTrashed();
    }

    public function user()
    {
        return $this->morphTo(__FUNCTION__, 'user_type', 'user_id');
    }
}
