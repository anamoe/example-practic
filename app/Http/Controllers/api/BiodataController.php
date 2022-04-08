<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    //
    public function getbiodata(){
        $b=Biodata::first();
        $b->foto_profil = url('biodata/'.$b->foto_profil);
        return response()->json($b);
    }
}
