<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesehatanIbuAnak extends Model
{
    use HasFactory;
    protected $table = 'kesehatan_ibu_anaks';
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
    public function ibu_anak()
    {
    return $this->belongsTo(IbuAnak::class, 'indikator_id', 'id');
    }
    public function tahun()
    {
    return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
}