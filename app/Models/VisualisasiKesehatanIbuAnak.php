<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisualisasiKesehatanIbuAnak extends Model
{
    use HasFactory;
    protected $table = 'visualisasi_kesehatan_ibu_anaks';
    protected $fillable = [
        'indikator_id',
        'tahun_id',
        'link_visualisasi',
        
    ];
    public function ibu_anak()
    {
    return $this->belongsTo(IbuAnak::class, 'indikator_id', 'id');
    }
    public function tahun()
    {
    return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
}