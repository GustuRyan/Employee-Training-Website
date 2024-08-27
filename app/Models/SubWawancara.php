<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubWawancara extends Model
{
    use HasFactory;
    protected $fillable = [
        'mental',
        'attitude',
        'komunikasi',
        'motivasi',
        'bobot_total'
      ];
}
