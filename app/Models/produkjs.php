<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkjs extends Model
{
    use HasFactory;
    protected $table = "produkjualsampah";
    protected $primaryKey = "id_js";
    public $timestamps = false;
    protected $fillable = [
        'gambar_js',
        'judul_js',
        'deskripsi_js',
        'harga_js',
        'satuan_js',
        
    ];

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "id_kecamatan","id_kecamatan");
    }
}
