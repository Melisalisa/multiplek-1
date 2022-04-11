<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'kategori_id',
        'user_id',
        'tanggal',
        'jumlah_pendapatan',
        'total',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
