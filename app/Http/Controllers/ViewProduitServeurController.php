<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewProduitServeurController extends Controller
{
    public function produitServeur($idBar){

        return response()->json(\App\Models\view_nourriture::where('ID_BAR',$idBar)->get());

    }
}
