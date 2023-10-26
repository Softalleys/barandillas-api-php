<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Http\Controllers\FolioController;

class JudgeRuling extends Model
{
    use HasFactory;
    use Uuid;

    protected $filable = [
        'folio_uuid',
        'fault_cited',
        'fault_commited',
        'art_broken_number',
        'sanction',
        'time_in_arrest',
        'free_by',
        'release_observation',
        'judge_receptor_number',
        'judge_receptor_fullname',
        'judge_releasing_number',
        'judge_releasing_fullname',
        'releasing_datetime',
        'has_freedom_auth',
        'commissioner_receptor_number',
        'commissioner_receptor_fullname',
        'commissioner_release_number',
        'commissioner_release_fullname'
    ];

    public function folio()
    {
        return $this->belongsTo(Folio::class, 'folio_uuid');
    }
    
}
