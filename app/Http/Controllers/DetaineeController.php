<?php

namespace App\Http\Controllers;

use App\Models\Detainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controller\FolioController;

class DetaineeController extends Controller
{
       public function index()
    {
        $detainee = Detainee::all();

        return response()->json([
            'folio_uuid' => $detainee,
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admission_date' => 'required|date|max:225',
            'detention_time' => 'required|string|max:225',
            'releasing_date' => 'required|date|max:225',
            'releasing_time' => 'required|string|max:225',
            'arrest_cause' => 'required|string|max:225',
            'detainee_firstname' => 'required|string|max:225',
            'detainee_lastname1' => 'required|string|max:225',
            'detainee_lastname2' => 'required|string|max:225',
            'detainee_nickname' => 'required|string|max:225',
            'detainee_gang' => 'required|string|max:225',
            'detainee_occupation' => 'required|string|max:225',
            'detainee_sex' => 'required|string|max:225',
            'detainee_age' => 'required|Integer|max:225',
            'detainee_birthdate' => 'required|Integer|max:225',
            'detainee_marital_state' => 'required|string|max:225',
            'detainee_scholarship' => 'required|string|max:225',
            'detainee_country' => 'required|string|max:225',
            'detainee_nationality' => 'required|string|max:225',
            'detainee_address' => 'required|string|max:225',
            'detainee_address_number' => 'required|string|max:225',
            'detainee_address_internal_number' => 'required|string|max:225',
            'detainee_street1' => 'required|string|max:225',
            'detainee_street2' => 'required|string|max:225',
            'detainee_neighborhood' => 'required|string|max:225',
            'detainee_zipcode' => 'required|string|max:225',
            'detainee_city' => 'required|string|max:225',
            'detainee_state' => 'required|string|max:225',
            'detainee_tel' => 'required|string|max:225'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);

        }else{
            
            $detainee = new Detainee;
            $detainee->folio_uuid = $request->folio_uuid;
            $detainee->admission_date = $request->admission_date;
            $detainee->detention_time = $request->detention_time;
            $detainee->releasing_date = $request->releasing_date;
            $detainee->releasing_time = $request->releasing_time;
            $detainee->arrest_cause = $request->arrest_cause;
            $detainee->detainee_firstname = $request->detainee_firstname;
            $detainee->detainee_lastname1 = $request->detainee_lastname1;
            $detainee->detainee_lastname2 = $request->detainee_lastname2;
            $detainee->detainee_nickname = $request->detainee_nickname;
            $detainee->detainee_gang = $request->detainee_gang;
            $detainee->detainee_occupation = $request->detainee_occupation;
            $detainee->detainee_sex = $request->detainee_sex;
            $detainee->detainee_age = $request->detainee_age;
            $detainee->detainee_birthdate = $request->detainee_birthdate;
            $detainee->detainee_marital_state = $request->detainee_marital_state;
            $detainee->detainee_scholarship = $request->detainee_scholarship;
            $detainee->detainee_country = $request->detainee_country;
            $detainee->detainee_nationality = $request->detainee_nationality;
            $detainee->detainee_address = $request->detainee_address;
            $detainee->detainee_address_number = $request->detainee_address_number;
            $detainee->detainee_address_internal_number = $request->detainee_address_internal_number;
            $detainee->detainee_street1 = $request->detainee_street1;
            $detainee->detainee_street2 = $request->detainee_street2;
            $detainee->detainee_neighborhood = $request->detainee_neighborhood;
            $detainee->detainee_zipcode = $request->detainee_zipcode;
            $detainee->detainee_city = $request->detainee_city;
            $detainee->detainee_state = $request->detainee_state;
            $detainee->detainee_tel = $request->detainee_tel;

            $detainee->save();

            if($detainee){

                return response()->json([
                    'status' => 200,
                    'message' => 'Detainee created successfully'
                ], 200);
            }else{

                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ], 500);
            }
        }
    }
}
