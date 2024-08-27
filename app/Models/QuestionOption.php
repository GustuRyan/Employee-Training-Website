<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class QuestionOption extends Model
{
    use HasFactory;

    protected $table = 'soal_option';

    protected $fillable = [
        'soal',
        'jawaban',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
        'id_modul',
    ];

    public function module()
    {
        return $this->belongsTo(Modules::class);
    }
}
