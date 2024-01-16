<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelImage extends Model
{
    use HasFactory;

    protected $table = 'artikel_images';

    protected $guarded = [];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
