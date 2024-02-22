<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewBoissonsSansAlcoolController extends Controller
{
    public function getBoissonsSansAlcool($idBar){

        return response()->json(\App\Models\view_boissonsSansAlcool::where('ID_BAR',$idBar)->get());

    }
}
