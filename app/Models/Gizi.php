<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gizi extends Model
{
    use HasFactory;
    protected $table = 'gizis';
    protected $fillable = [
        'indikator',
    ];

}