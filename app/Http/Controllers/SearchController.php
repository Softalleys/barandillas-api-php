<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detainee;
use App\Models\Folio;
use App\Models\IphCard;

class SearchController extends Controller
{
    public function searchDetainees(Request $request)
    {
        $folio = $request->input('folio');
        $folio = Folio::where('folio', $folio)->first();
    
        if ($folio) {
            $folioUuid = $folio->id;
            $detainee = Detainee::where('folio_uuid', $folioUuid)->first();
    
            if ($detainee) {
                return response()->json(['detainee' => $detainee], 200);
            } else {
                return response()->json(['message' => 'No se encontró al detenido correspondiente'], 404);
            }
        } else {
            return response()->json(['message' => 'No se encontró el folio correspondiente'], 404);
        }
    }

    public function searchIphs(Request $request)
    {
        $folio = $request->input('folio');
        $folio = Folio::where('folio', $folio)->first();

        if ($folio) {
            $folioUuid = $folio->id;
            $iph = IphCard::where('folio_uuid', $folioUuid)->first();

            if($iph) {
                return response()->json(['iph' => $iph], 200);
            } else {
                return response()->json(['message' => 'No se encontró el IPH correspondiente'], 404);
            }
        } else {
            return response()->json(['message' => 'No se encontró el folio correspondiente']);
        }
    }

    
    public function searchFolio(Request $request)
    {
        $folio = $request->input('folio');
        $folios = Folio::where('folio', $folio)->first();
        return $folios;
    }

    public function searchFolios(Request $request)
    {
        $folio = $request->input('folio');
        $folios = Folio::where('folio', $folio)->get();
        return $folios;
    }

    public function searchName(Request $request)
    {
        $folio = $request->input('detainee_full_name');
        $folios = Folio::where('detainee_full_name', 'LIKE', "%$folio%")->first();
        return $folios;
    }
}
