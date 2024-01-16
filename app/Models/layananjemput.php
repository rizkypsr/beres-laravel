<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layananjemput extends Model
{
    use HasFactory;
    protected $table = "layanan_jemput";
    protected $primaryKey = "id_layanan";
    public $timestamps = false;
    protected $fillable = [
        'kecamatan_layanan',
        'nama_layanan',
        'alamat_layanan',
        'no_hp_layanan',
        'jenis_sampah_layanan',
        'status_layanan',


    ];
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "kecamatan_layanan", "id_kecamatan");
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, "nama_layanan", "id_customer");
    }
}
