<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorTopik extends Model
{
    use HasFactory;

    protected $table = 'indikator_topiks';
    protected $fillable = [
        'topik_kesehatan_id',
        'indikator_topik',
        'informasi',
        
    ];

    public function topik_kesehatan()
    {
    return $this->belongsTo(TopikKesehatan::class, 'topik_kesehatan_id', 'id');
    }
    
}