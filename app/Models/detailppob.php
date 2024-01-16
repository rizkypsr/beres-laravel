<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailppob extends Model
{
    use HasFactory;
    protected $table = "detailppob";
    protected $primaryKey = "id_detailppob";
    public $timestamps = false;
    protected $fillable = [
        'id_ppob_detail',
        'gambar_detailppob',
        'harga_detailppob',
        'bayar_detailppob',
        
    ];
    public function ppob()
    {
        return $this->belongsTo(ppob::class, "id_ppob_detail","id_ppob");
    }
}
