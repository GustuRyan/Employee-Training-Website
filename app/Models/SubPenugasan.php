<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPenugasan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kesesuaian',
        'kreativitas',
        'inovasi',
        'bobot_total'
      ];
}
