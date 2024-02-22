<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewBoissonsAlcoolController extends Controller
{
    public function getBoissonsAlcool($idBar){

        return response()->json(\App\Models\view_boissonsAlcool::where('ID_BAR',$idBar)->get());

    }
}
