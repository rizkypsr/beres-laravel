<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qurbansampah extends Model
{
    use HasFactory;
    protected $table = "qurbansampah";
    protected $primaryKey = "id_qurban";
    public $timestamps = false;
    protected $fillable = [
        'gambar_qurban',
        'nama_qurban',
        'deskripsi_qurban',
        
    ];
}
