<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function challenge()
    {
        return $this->belongsTo(challenges::class)->withTrashed();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, "customer_id", "id_customer");
    }

    public function user_challenge_images()
    {
        return $this->hasMany(UserChallengeImage::class);
    }
}
