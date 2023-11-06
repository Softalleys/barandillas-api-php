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

    public function searchFolio(Request $request)
    {
        $folio = $request->input('folio');

        $folios = DB::table('folios')->where('folio', $folio)->get();

        return $folios;
    }

    public function folioData(Request $request)
    {
        $folioId = $request->input('id');

        $folioData = DB::table('folios')->where('id', $folioId)->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|max:225',
            'detainee_full_name' => 'required|string|max:225',
            'receptor_staff_name' => 'required|string|max:225',
            'receptor_manager_name' => 'required|string|max:225',
            'release_staff_name' => 'required|string|max:225',
            'release_manager_name' => 'required|string|max:225',
            'personal_belongings' => 'required|array|max:225',
            'observations' => 'required|string|max:225',
        ]);

        if($validator->fails()){
            
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);

        }else{

            $folio = new Folio;
            $folio->folio = Str::random(8);
            $folio->date = $request->date;
            $folio->detainee_full_name = $request->detainee_full_name;
            $folio->receptor_staff_name = $request->receptor_staff_name;
            $folio->receptor_manager_name = $request->receptor_manager_name;
            $folio->release_staff_name = $request->release_staff_name;
            $folio->release_manager_name = $request->release_manager_name;
            $folio->personal_belongings = json_encode($request->personal_belongings);
            $folio->observations = $request->observations;

            $folio->save();

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
