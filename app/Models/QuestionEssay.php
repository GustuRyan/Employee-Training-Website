<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class QuestionEssay extends Model
{
    use HasFactory;

    protected $table = 'soal_essai';

    protected $fillable = [
        'soal',
        'jawaban',
        'id_modul',
    ];

    public function module()
    {
        return $this->belongsTo(Modules::class);
    }
}
