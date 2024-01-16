<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
    protected $table = "kecamatan";
    protected $primaryKey = "id_kecamatan";
    public $timestamps = false;
    protected $fillable = [
        'id_kota_kecamatan',
        'nama_kecamatan'
        
    ];

    public function kota()
    {
        return $this->belongsTo(kota::class, "id_kota_kecamatan", "id_kota");
    }
}
