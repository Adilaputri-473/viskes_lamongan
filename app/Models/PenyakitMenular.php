<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitMenular extends Model
{
    use HasFactory;
    protected $table = 'penyakit_menulars';

    protected $fillable = [
        'indikator',
    ];
}