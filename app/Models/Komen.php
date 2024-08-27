<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $table = 'komen';
    protected $fillable = [
        'parent',
        'id_pengguna',
        'komentar',
      ];
    
      public function pengguna()
      {
          return $this->belongsTo(Pengguna::class, 'id_pengguna');
      }
}
