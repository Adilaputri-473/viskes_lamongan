<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusGizi extends Model
{
    use HasFactory;
    protected $table = 'status_gizis';
    protected $fillable = [
        'kecamatan_id',
        'indikator_id',
        'tahun_id',
        'jumlah',
        
    ];

    public function kecamatan()
    {
    return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
    public function gizi()
    {
    return $this->belongsTo(Gizi::class, 'indikator_id', 'id');
    }
    public function tahun()
    {
    return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
}