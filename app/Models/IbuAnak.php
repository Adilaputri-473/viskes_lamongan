<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuAnak extends Model
{
    use HasFactory;
    protected $table = 'ibu_anaks';
    protected $fillable = [
        'indikator',
    ];

}