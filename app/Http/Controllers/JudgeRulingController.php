<?php

namespace App\Http\Controllers;

use App\Models\JudgeRuling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controller\FolioController;

class JudgeRulingController extends Controller
{
    public function index(){

        $judgeRuling = JudgeRuling::all();

        return response()->json([
            'folio_uuid' => $judgeRuling,
        ]);
    }



    public function getFolioData()
    {
        $folio = Folio::with(['detainees', 'iph_cards'])->find($folio_uuid);

        return response()->json([
            'folioData' => $folio
        ], 200);
    }
    
    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), [
            'folio_uuid' => 'required|string|max:225',
            'fault_cited' => 'required|string|max:225',
            'fault_commited' => 'required|string|max:225',
            'art_broken_number' => 'required|string|max:225',
            'sanction' => 'required|string|max:225',
            'time_in_arrest' => 'required|string|max:225',
            'free_by' => 'required|string|max:225',
            'release_observation' => 'required|string|max:225',
            'judge_receptor_number' => 'required|string|max:225',
            'judge_receptor_fullname' => 'required|string|max:225',
            'judge_releasing_number' => 'required|string|max:225',
            'judge_releasing_fullname' => 'required|string|max:225',
            'releasing_datetime' => 'required|string|max:225',
            'has_freedom_auth' => 'required|string|max:225',
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
            
        }else{

            $judgeRuling = new JudgeRuling;
            $judgeRuling->folio_uuid = $request->folio_uuid;
            $judgeRuling->fault_cited = $request->fault_cited;
            $judgeRuling->fault_commited = $request->fault_commited;
            $judgeRuling->art_broken_number = $request->art_broken_number;
            $judgeRuling->sanction = $request->sanction;
            $judgeRuling->time_in_arrest = $request->time_in_arrest;
            $judgeRuling->free_by = $request->free_by;
            $judgeRuling->release_observation = $request->release_observation;
            $judgeRuling->judge_receptor_number = $request->judge_receptor_number;
            $judgeRuling->judge_receptor_fullname = $request->judge_receptor_fullname;
            $judgeRuling->judge_releasing_number = $request->judge_releasing_number;
            $judgeRuling->judge_releasing_fullname = $request->judge_releasing_fullname;
            $judgeRuling->releasing_datetime = $request->releasing_datetime;
            $judgeRuling->has_freedom_auth = $request->has_freedom_auth;

            $judgeRuling->save();

            if($judgeRuling){

                return response()->json([
                    'status' => 200,
                    'message' => 'Judge ruling created successfully',
                ], 200);
            }else{

                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
                ], 500);
            }
        }
    }
}
