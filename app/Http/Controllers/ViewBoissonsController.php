<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewBoissonsController extends Controller
{
    public function getBoissons($idBar){

        return response()->json(\App\Models\view_boissonsSansAlcool::where('ID_BAR',$idBar)->get());

    }
}
