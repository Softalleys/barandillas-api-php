<?php

namespace App\Http\Controllers;

use App\Models\IphCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controller\SeizedItemController;

class IphCardController extends Controller
{
    public function index()
    {
        $iphCard =IphCard::all();

        return response()->json([
            'folio_uuid' => $iphCard,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|max:225',
            'time' => 'required|string|max:225',
            'detention_time' => 'required|string|max:255',
            'detention_zone' => 'required|string|max:255',
            'capturist_info_number' => 'required|string|max:255',
            'capturist_info_fullname' => 'required|string|max:255',
            'fault' => 'required|string|max:255',
            'detainee_firstname' => 'required|string|max:255',
            'detainee_lastname1' => 'required|string|max:255',
            'detainee_lastname2' => 'required|string|max:255',
            'detainee_nickname' => 'required|string|max:255',
            'detainee_birthdate' => 'required|date|max:255',
            'detainee_age' => 'required|string|max:255',
            'detainee_sex' => 'required|string|max:255',
            'detainee_gang' => 'required|string|max:255',
            'detainee_detention_street' => 'required|string|max:255',
            'detainee_detention_street2' => 'required|string|max:255',
            'detainee_detention_neighborhood' => 'required|string|max:255',
            'detainee_detention_city' => 'required|string|max:255',
            'police_number' => 'required|string|max:255',
            'police_plate' => 'required|string|max:255',
            'police_zone' => 'required|string|max:255',
            'police_company' => 'required|string|max:255',
            'police_unit_number' => 'required|string|max:255',
            'police_name' => 'required|string|max:255',
            'police_job' => 'required|string|max:255',
            'police_group' => 'required|string|max:255',
            'ref_authority' => 'required|string|max:255',
            'iph_fault' => 'required|string|max:255',
            'iph_felony' => 'required|string|max:255',
            'detainee_height' => 'required|string|max:255',
            'detainee_hair_color' => 'required|string|max:255',
            'detainee_hair_length' => 'required|string|max:255',
            'detainee_beard' => 'required|string|max:255',
            'detainee_accent' => 'required|string|max:255',
            'detainee_skin_color' => 'required|string|max:255',
            'detainee_eyes_color' => 'required|string|max:255',
            'detainee_hair_type' => 'required|string|max:255',
            'detainee_signs' => 'required|string|max:255',
            'detainee_particular_signs' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $iphCard = new IphCard;
            $iphCard->folio_uuid = $request->folio_uuid;
            $iphCard->date = $request->date;
            $iphCard->time = $request->time;
            $iphCard->detention_time = $request->detention_time;
            $iphCard->detention_zone = $request->detention_zone;
            $iphCard->capturist_info_number = $request->capturist_info_number;
            $iphCard->capturist_info_fullname = $request->capturist_info_fullname;
            $iphCard->fault = $request->fault;
            $iphCard->detainee_firstname = $request->detainee_firstname;
            $iphCard->detainee_lastname1 = $request->detainee_lastname1;
            $iphCard->detainee_lastname2 = $request->detainee_lastname2;
            $iphCard->detainee_nickname = $request->detainee_nickname;
            $iphCard->detainee_birthdate = $request->detainee_birthdate;
            $iphCard->detainee_age = $request->detainee_age;
            $iphCard->detainee_sex = $request->detainee_sex;
            $iphCard->detainee_gang = $request->detainee_gang;
            $iphCard->detainee_detention_street = $request->detainee_detention_street;
            $iphCard->detainee_detention_street2 = $request->detainee_detention_street2;
            $iphCard->detainee_detention_neighborhood = $request->detainee_detention_neighborhood;
            $iphCard->detainee_detention_city = $request->detainee_detention_city;
            $iphCard->police_number = $request->police_number;
            $iphCard->police_plate = $request->police_plate;
            $iphCard->police_zone = $request->police_zone;
            $iphCard->police_company = $request->police_company;
            $iphCard->police_unit_number = $request->police_unit_number;
            $iphCard->police_name = $request->police_name;
            $iphCard->police_job = $request->police_job;
            $iphCard->police_group = $request->police_group;
            $iphCard->ref_authority = $request->ref_authority;
            $iphCard->iph_fault = $request->iph_fault;
            $iphCard->iph_felony = $request->iph_felony;
            $iphCard->detainee_height = $request->detainee_height;
            $iphCard->detainee_hair_color = $request->detainee_hair_color;
            $iphCard->detainee_hair_length = $request->detainee_hair_length;
            $iphCard->detainee_beard = $request->detainee_beard;
            $iphCard->detainee_accent = $request->detainee_accent;
            $iphCard->detainee_skin_color = $request->detainee_skin_color;
            $iphCard->detainee_eyes_color = $request->detainee_eyes_color;
            $iphCard->detainee_hair_type = $request->detainee_hair_type;
            $iphCard->detainee_signs = $request->detainee_signs;
            $iphCard->detainee_particular_signs = $request->detainee_particular_signs;

            $iphCard->save();

            if($iphCard){

                return response()->json([
                    'status' => 200,
                    'message' => 'IphCard created successfully'
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
