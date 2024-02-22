<?php

namespace App\Http\Controllers;

use App\Models\AEMPORTER;
use App\Models\Commande;
use App\Models\COMPOSER;
use App\Models\RECOI;
use App\Models\SURPLACE;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use IlluminateSupportCarbon;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;


class CommandeController extends Controller
{
    public function ajoutCommandeEmporter(Request $request){
        $commande = new Commande();
        $commande->HEURECOMMANDE = now();
        $commande->save();
        $lastinsertID = $commande->IDCOMMANDE;
        $commandeContenu = [18 => 15,5 => 10,3 => 14];
        foreach ($commandeContenu as $produit => $qte){
        $this->commandeAfond($lastinsertID,$produit,$qte);
        }

        $commandeEmporter = new AEMPORTER();
        $dateretrait = Carbon::now()->addHour(2);
        $commandeEmporter->IDCOMMANDE_HER_1 = $lastinsertID;
        $commandeEmporter->IDCOMMANDE = $lastinsertID;
        $commandeEmporter->ID_USER = $request->idClient;
        $commandeEmporter->HEURERETRAIT = $dateretrait;
        $commandeEmporter->CODERETRAIT = Str::random(5);
        $commandeEmporter->save();

        $commandeAppartenir = new RECOI();
        $commandeAppartenir->ID_BAR = $request->idBar;
        $commandeAppartenir->IDCOMMANDE = $lastinsertID;
        $commandeAppartenir->save();
        //$infoEmail = \App\Models\AEMPORTER::where('ID_USER',$request->idClient)->where('IDCOMMANDE',$lastinsertID)->with('client')->with('commande')->first();
        $infoEmail = \App\Models\AEMPORTER::where('ID_USER',$request->idClient)->where('IDCOMMANDE',$lastinsertID)->with('user')->with('commande')->first();
        //dd($test);
        $this->email($infoEmail);

        return response()->json(\App\Models\AEMPORTER::where('ID_USER',$request->idClient)->where('IDCOMMANDE',$lastinsertID)->with('user')->with('commande')->get());
    }

    public function ajoutCommandeSurplace(Request $request){
        $commande = new Commande();
        $commande->HEURECOMMANDE = now();
        $commande->save();
        $lastinsertID = $commande->IDCOMMANDE;
        $commandeContenu = [18 => 15,5 => 10,3 => 14];
        foreach ($commandeContenu as $produit => $qte){
            $this->commandeAfond($lastinsertID,$produit,$qte);
        }

        $commandeSurplace = new SURPLACE();
        $commandeSurplace->IDCOMMANDE = $lastinsertID;
        $commandeSurplace->ID_USER = $request->idBarman;
        $commandeSurplace->NUMTABLE = $request->table;
        $commandeSurplace->save();

        $commandeAppartenir = new RECOI();
        $commandeAppartenir->ID_BAR = $request->idBar;
        $commandeAppartenir->IDCOMMANDE = $lastinsertID;
        $commandeAppartenir->save();

        //$test = \App\Models\SURPLACE::where('ID_USER',$request->idBarman)->where('IDCOMMANDE',$lastinsertID)->with('barman')->with('commande')->first();
        //dd($test);
        //$this->email($test);
        //ta pas le prix parce que ça fait une boucle infinie car tu appel avec produit stocker et stocker appel produit ect..

        return response()->json(\App\Models\SURPLACE::where('ID_USER',$request->idBarman)->where('IDCOMMANDE',$lastinsertID)->get());
    }

    public function commandeAfond($id,$contenu,$qte){
        $composer = new Composer();
            COMPOSER::create([
                $composer->IDCOMMANDE = $id,
                $composer->ID_PRODUIT = $contenu,
                $composer->QUANTITE = $qte,
            ]);
            $composer->save();
    }

    public function random(){
        /*$r1=[1,'g',5,'k',8,'i',5,];
        $r2=[2,'t','K','P',7,'D',0,];
        $r3=[4,'B','v','c',3,'a',6,];
        $code = [array_rand($r1),array_rand($r2),array_rand($r3)];*/
        $code = Str::random(5);
        $today = today();
        echo $today;
    }

    public function email($id){
        $mailData = [
            "Nom" => $id->user->name,
            "HeureRetrait" => $id->HEURERETRAIT,
            "Code" => $id->CODERETRAIT,
            "Produit" => $id->commande,
            //POURQUOI LE ID_PRODUIT NE MARCHE PAS
        ];
        Mail::to("hello@example.com")->send(new TestEmail($mailData));

        dd("Mail Sent Successfully!");
    }
}
