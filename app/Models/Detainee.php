<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Http\Controllers\FolioController;

class Detainee extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'folio_uuid',
        'reff_authority_name',
        'fault',
        'admission_date',
        'detention_time',
        'releasing_date',
        'releasing_time',
        'arrest_cause',
        'has_witness',
        'week_number',
        'detainee_firstname',
        'detainee_lastname1',
        'detainee_lastname2',
        'detainee_nickname',
        'detainee_occupation',
        'detainee_sex',
        'detainee_age',
        'detainee_marital_state',
        'detainee_scholarship',
        'detainee_country',
        'detainee_nationality',
        'detainee_address',
        'detainee_address_number',
        'detainee_address_internal_number',
        'detainee_street1',
        'detainee_street2',
        'detainee_neighborhood',
        'detainee_zipcode',
        'detainee_city',
        'detainee_state',
        'detainee_tel'
    ];

    public function folio()
    {
        return $this->belongsTo(Folio::class, 'folio_uuid');
    }
    
}
