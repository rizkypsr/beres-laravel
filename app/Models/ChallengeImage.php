<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeImage extends Model
{
    use HasFactory;

    protected $table = 'challenge_images';

    protected $fillable = [
        'challenge_id',
        'image',
    ];

    public function challenge()
    {
        return $this->belongsTo(challenges::class);
    }
}
