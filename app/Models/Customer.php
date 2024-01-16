<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "customer";

    protected $primaryKey = "id_customer";

    public $timestamps = false;

    protected $guarded = [];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, "id_customer_transaksi", "nik_customer");
    }

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "id_kecamatan_customer", "id_kecamatan");
    }

    public function user_challenge()
    {
        return $this->hasMany(UserChallenge::class, "customer_id", "id_customer");
    }
}
