<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Turno;

class TurnosController extends Controller
{
    //
    public function get()
    {
        $minutes = 1;
        
        $data = Cache::remember('turno_data', $minutes, function () {
            $turnoModel = new Turno;
            return $turnoModel->get();
        });
    
        return response()->json($data);
    }
}
