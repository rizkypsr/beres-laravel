<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;
    protected $table = "kota";
    protected $primaryKey = "id_kota";
    public $timestamps = false;
    protected $fillable = [
        'nama_kota',

    ];

    public function kecamatan()
    {
        return $this->hasMany(kecamatan::class, "id_kota_kecamatan");
    }
}
