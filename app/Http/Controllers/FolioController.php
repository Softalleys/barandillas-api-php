<?php

namespace App\Http\Controllers;

use App\Models\Folio;
use Illuminate\Http\Request;

class FolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folios = Folio::all();

        return response()->json([
            'folios' => $folios,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'date' => 'required|date|max:225',
            'detainee_full_name' => 'required|string|max:225',
            'receptor_staff_name' => 'required|string|max:225',
            'receptor_manager_name' => 'required|string|max:225',
            'release_staff_name' => 'required|string|max:225',
            'release_manager_name' => 'required|string|max:225',
            'personal_belongings' => 'required|string|max:225',
            'observations' => 'required|string|max:225',
        ]);

        if($validatedData->fails()){
            
            return response()->json([
                'status' => 422,
                'errors' => $validatedData->messages()
            ], 422);

        }else{

            $folio = new Folio;
            $folio->folio = Str::upper(Str::random(8));
            $folio->date = $date;
            $folio->detainee_full_name = $detainee_full_name;
            $folio->receptor_staff_name = $receptor_staff_name;
            $folio->receptor_manager_name = $receptor_manager_name;
            $folio->release_staff_name = $release_staff_name;
            $folio->release_manager_name = $release_manager_name;
            $folio->personal_belongings = $personal_belongings;
            $folio->observations = $observations;

            $folio->save();

            // $folio = Folio::create([
            //     'detainee_full_name' => $request->detainee_full_name,
            //     'receptor_staff_name' => $request->receptor_staff_name,
            //     'receptor_manager_name' => $request->receptor_manager_name,
            //     'release_staff_name' => $request->release_staff_name,
            //     'release_manager_name' => $request->release_manager_name,
            //     'personal_belongings' => $request->personal_belongings,
            //     'observations' => $request->observations,
            // ]);

            if($folio){

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
        
        // $date = $request->input('date');
        // $detainee_full_name = $request->input('detainee_full_name');
        // $receptor_staff_name = $request->input('receptor_staff_name');
        // $receptor_manager_name = $request->input('receptor_manager_name');
        // $release_staff_name = $request->input('release_staff_name');
        // $release_manager_name = $request->input('release_manager_name');
        // $personal_belongings = $request->input('personal_belongings');
        // $observations = $request->input('observations');

        // $folio = new Folio;
        // $folio->folio = Str::upper(Str::random(8));
        // $folio->date = $date;
        // $folio->detainee_full_name = $detainee_full_name;
        // $folio->receptor_staff_name = $receptor_staff_name;
        // $folio->receptor_manager_name = $receptor_manager_name;
        // $folio->release_staff_name = $release_staff_name;
        // $folio->release_manager_name = $release_manager_name;
        // $folio->personal_belongings = $personal_belongings;
        // $folio->observations = $observations;

        // $folio->save();

        // return response()->json(['message' => 'Form submitted successfully']);
        // }

        // // $validatedData = $request->validate([
        // //     'date' => 'required|date',
        // //     'detainee_full_name' => 'required|string',
        // //     'receptor_staff_name' => 'required|string',
        // //     'receptor_manager_name' => 'required|string',
        // //     'release_staff_name' => 'required|string',
        // //     'release_manager_name' => 'required|string',
        // //     'personal_belongings' => 'required|string',
        // //     'observations' => 'required|string',
        // // ]);

        // // $folio = Folio::store($validatedData);

        // // return response()->json([
        // //     'folio' => $folio,
        // //     'message' => 'Folio created successfully',
        // // ]);
}
