<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Http\Controllers\FolioController;

class MedicalRecord extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'folio_uuid',
        'detainee_firstname',
        'detainee_lastname1',
        'detainee_lastname2',
        'detainee_age',
        'time',
        'date',
        'dictum',
        'medical_exam',
        'injuries_description',
        'medical_observations',
        'has_marijuana_intoxication',
        'detainee_gang',
        'physical_exploration',
        'alcohosensor',
        'diagnosis_description',
        'drugs_type',
        'doctor_number',
        'doctor_plate',
        'doctor_fullname'
    ];

    protected $casts = [
        'diagnosis_description' => 'array',
        'drugs_type' => 'array'
    ];
    
    public function folio()
    {
        return $this->belongsTo(Folio::class, 'folio_uuid');
    }
}
