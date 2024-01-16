<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksippob extends Model
{
    use HasFactory;
    protected $table = "transaksippob";
    protected $primaryKey = "id_transaksippob";
    public $timestamps = false;
    protected $fillable = [
        'customer_ppob',
        'produk_transaksi_ppob',
        'harga_transaksi_ppob',
        'bayar_transaksi_ppob',
        'nomor_inputan',
        'status_ppob',

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, "customer_ppob", "id_customer");
    }
    public function ppob()
    {
        return $this->belongsTo(ppob::class, "produk_transaksi_ppob", "id_ppob");
    }
}
