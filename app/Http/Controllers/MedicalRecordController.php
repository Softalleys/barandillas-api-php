<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controller\FolioController;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $medicalRecord = MedicalRecord::all();

        return response()->json([
            'folio_uuid' => $medicalRecord,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'detainee_firstname' => 'required|string|max:225',
            'detainee_lastname1' => 'required|string|max:225',
            'detainee_lastname2' => 'required|string|max:225',
            'detainee_age' => 'required|Integer|max:225',
            'time' => 'required|string|max:225',
            'date' => 'required|date|max:225',
            'dictum' => 'required|string|max:225',
            'medical_exam' => 'required|string|max:225',
            'injuries_description' => 'required|string|max:225',
            'medical_observations' => 'required|string|max:225',
            'has_marijuana_intoxication' => 'required|string|max:225',
            'detainee_gang' => 'required|string|max:225',
            'physical_exploration' => 'required|string|max:225',
            'alcohosensor' => 'required|string|max:225',
            'diagnosis_description' => 'required|array|max:225',
            'drugs_type' => 'required|array|max:225',
            'drugs_quantity' => 'required|string|max:225',
            'doctor_number' => 'required|string|max:225',
            'doctor_plate' => 'required|string|max:225',
            'doctor_fullname' => 'required|string|max:225',
        ]);

        if($validator->fails()){
            
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);

        }else{

            $medicalRecord = new medicalRecord;
            $medicalRecord->folio_uuid = $request->folio_uuid;
            $medicalRecord->detainee_firstname = $request->detainee_firstname;
            $medicalRecord->detainee_lastname1 = $request->detainee_lastname1;
            $medicalRecord->detainee_lastname2 = $request->detainee_lastname2;
            $medicalRecord->detainee_age = $request->detainee_age;
            $medicalRecord->time = $request->time;
            $medicalRecord->date = $request->date;
            $medicalRecord->dictum = $request->dictum;
            $medicalRecord->medical_exam = $request->medical_exam;
            $medicalRecord->injuries_description = $request->injuries_description;
            $medicalRecord->medical_observations = $request->medical_observations;
            $medicalRecord->has_marijuana_intoxication = $request->has_marijuana_intoxication;
            $medicalRecord->detainee_gang = $request->detainee_gang;
            $medicalRecord->physical_exploration = $request->physical_exploration;
            $medicalRecord->alcohosensor = $request->alcohosensor;
            $medicalRecord->diagnosis_description = json_encode($request->diagnosis_description);
            $medicalRecord->drugs_type = json_encode($request->drugs_type);
            $medicalRecord->drugs_quantity = json_encode($request->drugs_quantity);
            $medicalRecord->doctor_number = $request->doctor_number;
            $medicalRecord->doctor_plate = $request->doctor_plate;
            $medicalRecord->doctor_fullname = $request->doctor_fullname;

            $medicalRecord->save();

            if($medicalRecord){

                return response()->json([
                    'status' => 200,
                    'message' => 'Folio created successfully'
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
