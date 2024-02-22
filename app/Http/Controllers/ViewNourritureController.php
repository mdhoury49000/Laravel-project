<?php

namespace App\Http\Controllers;

use App\Models\COMMANDE;
use App\Models\COMPOSER;
use Illuminate\Http\Request;

class ViewNourritureController extends Controller
{
    public function getNourriture($idBar){

        return response()->json(\App\Models\view_nourriture::where('ID_BAR',$idBar)->get());

    }
}
