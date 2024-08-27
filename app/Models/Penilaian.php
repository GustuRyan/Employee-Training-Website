<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'user_id',
        'modul_id',
        'option_id',
        'essai_id',
        'answer',
        'flag',
        'scores',
    ];
}
