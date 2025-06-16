<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisualisasiStatusGizi extends Model
{
    use HasFactory;

    protected $table = 'visualisasi_status_gizis';
    protected $fillable = [
        'indikator_id',
        'tahun_id',
        'link_visualisasi',
        
    ];
    public function gizi()
    {
    return $this->belongsTo(Gizi::class, 'indikator_id', 'id');
    }
    public function tahun()
    {
    return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
}