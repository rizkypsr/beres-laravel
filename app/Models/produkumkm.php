<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkumkm extends Model
{
    use HasFactory;
    protected $table = "produk_umkm";
    protected $primaryKey = "id_produk_umkm";
    public $timestamps = false;
    protected $fillable = [
        'id_umkm_produk',
        'nama_produk_umkm',
        'gambar_produk_umkm',
        'deskripsi_produk_umkm',
        
        
    ];
    public function umkm()
    {
        return $this->belongsTo(umkm::class, "id_umkm_produk","id_umkm");
    }
}
