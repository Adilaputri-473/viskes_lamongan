<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikKesehatan extends Model
{
    use HasFactory;

    protected $table = 'topik_kesehatans';

    
    protected $fillable = [
        'topik_kesehatan',
    ];
}