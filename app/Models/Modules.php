<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $fillable = [
        'nama_modul',
        'judul',
        'deskripsi',
        'id_topik',
        'durasi',
        'jumlah_option',
        'jumlah_esai',
    ];

    public function module()
    {
        return $this->belongsTo(Topik::class);
    }
}
