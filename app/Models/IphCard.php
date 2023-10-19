<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Http\Controllers\FolioController;

class IphCard extends Model
{
    use HasFactory;
    use Uuid;
    
    protected $fillable = [
        'folio_uuid',
        'date',
        'time',
        'detention_time',
        'detention_zone',
        'capturist_info_number',
        'capturist_info_fullname',
        'fault',
        'detainee_firstname',
        'detainee_lastname1',
        'detainee_lastname2',
        'detainee_nickname',
        'detainee_birthdate',
        'detainee_age',
        'detainee_sex',
        'detainee_gang',
        'detainee_detention_street',
        'detainee_detention_street2',
        'detainee_detention_neighborhood',
        'detainee_detention_city',
        'police_number',
        'police_plate',
        'police_zone',
        'police_company',
        'police_unit',
        'police_name',
        'police_job',
        'police_group',
        'ref_authority',
        'iph_fault',
        'iph_felony',
        'detainee_height',
        'detainee_hair_color',
        'detainee_hair_length',
        'detainee_beard',
        'detainee_accent',
        'detainee_skin_color',
        'detainee_eyes_color',
        'detainee_hair_type',
        'detainee_signs',
        'detainee_particular_signs',
    ];

    public function folio()
    {
        return $this->belongsTo(Folio::class, 'folio_uuid');
    }
}
