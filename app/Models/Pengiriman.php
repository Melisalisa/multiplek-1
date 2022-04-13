<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';

    protected $fillable = [
        'user_id',
        'kategori_id',
        'tanggal',
        'jumlah_stok',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
