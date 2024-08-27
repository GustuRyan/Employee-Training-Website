<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengguna',
        'id_komen',
      ];

      public function komen()
      {
          return $this->belongsTo(Komen::class, 'id_komen');
      }
      public function pengguna()
      {
          return $this->belongsTo(Komen::class, 'id_pengguna');
      }
}
