<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKompetensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'riwayat',
        'pengalaman',
        'keahlian',
        'prestasi',
        'bobot_total'
      ];
}
