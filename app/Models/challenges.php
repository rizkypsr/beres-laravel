<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class challenges extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function userChallenges(): HasMany
    {
        return $this->hasMany(UserChallenge::class, 'challenge_id');
    }

    public function challengeImages(): HasMany
    {
        return $this->hasMany(ChallengeImage::class, 'challenge_id');
    }
}
