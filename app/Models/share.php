<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class share extends Model
{
    use HasFactory;
    protected $table = "share";
    protected $primaryKey = "id_share";
    public $timestamps = false;
    protected $fillable = [
        'url',
        'status_share',
        
    ];
}
