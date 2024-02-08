<?php

namespace App\Http\Controllers;

use App\Models\Folio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    
    public function getFolioData($id)
    {
        $folio = Folio::find($id);
        if ($folio) {
            return response()->json([
                'folio' => $folio,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Folio not found',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|max:225',
            'detainee_full_name' => 'required|string|max:225',
            'receptor_staff_name' => 'required|string|max:225',
            'receptor_manager_name' => 'required|string|max:225',
            'personal_belongings' => 'required|array|max:225',
            'observations' => 'required|string|max:225',
        ]);

        if($validator->fails()){
            
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);

        }else{

            $lastFolio = Folio::orderBy('created_at', 'desc')->first();
            $lastFolioNumber = $lastFolio ? $lastFolio->folio : 0;

            $newFolioNumber = str_pad(intval($lastFolioNumber) + 1 ,6, '0', STR_PAD_LEFT);

            $folio = new Folio;
            $folio->folio = $newFolioNumber;
            $folio->date = $request->date;
            $folio->detainee_full_name = $request->detainee_full_name;
            $folio->receptor_staff_name = $request->receptor_staff_name;
            $folio->receptor_manager_name = $request->receptor_manager_name;
            $folio->personal_belongings = json_encode($request->personal_belongings);
            $folio->observations = $request->observations;

            $folio->save();

            return $folio;

            // return response()->json([$folio->id]);

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
}
