<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umkm extends Model
{
    use HasFactory;
    protected $table = "umkm";
    protected $primaryKey = "id_umkm";
    public $timestamps = false;
    protected $fillable = [
        'id_kecamatan_umkm',
        'nama_umkm',
        'deskripsi_umkm',
        'gambar_umkm',
        
        
    ];
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "id_kecamatan_umkm","id_kecamatan");
    }
}
