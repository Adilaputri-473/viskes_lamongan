<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisualisasiKasusPenyakitMenular extends Model
{
    use HasFactory;

    protected $table = 'visualisasi_kasus_penyakit_menulars';
    protected $fillable = [
        'indikator_id',
        'tahun_id',
        'link_visualisasi',
        
    ];
    public function penyakit_menular()
    {
    return $this->belongsTo(PenyakitMenular::class, 'indikator_id', 'id');
    }
    public function tahun()
    {
    return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }

}