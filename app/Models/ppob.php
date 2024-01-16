<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ppob extends Model
{
    use HasFactory;
    protected $table = "ppob";
    protected $primaryKey = "id_ppob";
    public $timestamps = false;
    protected $fillable = [
        'gambar_ppob',
        'judul_ppob',
        
    ];
}
