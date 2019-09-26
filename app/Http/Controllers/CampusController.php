<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function listar(Request $request){


        // $campus = Campus::firstOrNew(['id' => $request->id]);
        // $campus->sigla = "BRT";
        // $campus->nome = "IFSP Barretos";
        // $campus->save();

        $campus = Campus::where('ativo', 1)->get();
        // dd($campus);
        return view('campus.listar')->with([
            "campus" => $campus
        ]);
    }   

    public function detalhes(Campus $campus, Request $request){

        // $campus = Campus::find($campus->id)->get();
        
        return view('campus.detalhes')->with([
            "campus" => $campus,
        ]);
    }


    public function createOrUpdate(Campus $campus, Request $request){

        $campus = Campus::firstOrNew(['id' => $request->id]);
        $campus->sigla = $request->sigla;
        $campus->nome = $request->nome;
        $campus->save();

        return redirect('campus/'.$campus->id.'/detalhes');
    }
}
