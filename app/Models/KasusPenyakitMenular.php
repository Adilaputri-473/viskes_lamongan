<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasusPenyakitMenular extends Model
{
    use HasFactory;
    protected $table = 'kasus_penyakit_menulars';
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
    public function penyakit_menular()
    {
    return $this->belongsTo(PenyakitMenular::class, 'indikator_id', 'id');
    }
    public function tahun()
    {
    return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
}