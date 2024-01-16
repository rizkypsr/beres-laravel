<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    use HasFactory;
    protected $table = "faq";
    protected $primaryKey = "id_faq";
    public $timestamps = false;
    protected $fillable = [
        'judul_faq',
        'deskripsi_faq',
        
    ];
}
