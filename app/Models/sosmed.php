<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sosmed extends Model
{
    use HasFactory;
    protected $table = "sosmed";
    protected $primaryKey = "id_sosmed";
    public $timestamps = false;
    protected $fillable = [
        'nama_sosmed',
        'deskripsi_sosmed',
        
    ];
}
