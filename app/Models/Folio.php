<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Models\MedicalRecord;
use App\Models\IphCard;
use App\Models\JudgeRuling;

class Folio extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'date',
        'detainee_full_name',
        'receptor_staff_name',
        'receptor_manager_name',
        'release_staff_name',
        'release_manager_name',
        'personal_belongings',
        'observations'
    ];
   
    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class, 'folio_uuid');
    }

    public function iphCard()
    {
        return $this->hasOne(IphCard::class, 'folio_uuid');
    }

    public function judgeRuling()
    {
        return $this->hasOne(JudgeRuling::class, 'folio_uuid');
    }

    public function detainee()
    {
        return $this->hasOne(Detainee::class, 'folio_uuid');
    }

}