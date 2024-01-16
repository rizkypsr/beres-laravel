<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChallengeImage extends Model
{
    use HasFactory;

    protected $table = 'user_challenge_images';

    protected $guarded = [];

    public function user_challenge()
    {
        return $this->belongsTo(UserChallenge::class);
    }
}
