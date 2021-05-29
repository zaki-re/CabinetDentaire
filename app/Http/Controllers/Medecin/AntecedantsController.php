<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Models\Antecedants;
use App\Models\MaladeAntecedants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntecedantsController extends Controller
{
    public function maladeAntecedants($id){
    $maladeAntecedants = MaladeAntecedants::where("id_malade",$id)->where('id_medecin',Auth::user()->id)->get();

    $antecedants=[];
    $i=0;
   foreach($maladeAntecedants as $maladeAntecedant){

       $antecedants[$i] = Antecedants::where("id",$maladeAntecedant->id_antecedant)->first()->type;
       $i++;
   }
   return $antecedants;


    }
    public function antecedantsShow(){
        return view('medecin.antecedants');
    }
    public function getAntecedants(){
        return  Antecedants::where('id_medecin',Auth::user()->id)->get();

    }
    public function createAntecedants(Request $request){
        return  Antecedants::create([
            'type'=>$request->type,
            'id_medecin'=>Auth::user()->id,
        ]);

    }
    public function removeAntecedants($id){
        if(Antecedants::where('id',$id)->exists() && !MaladeAntecedants::where('id_antecedant',$id)->exists() ){
            $antecedant = Antecedants::findOrFail($id);
            $antecedant->delete();
            return response()->json(['status' => 200, 'error' => 'antecedants Supprimer avec succés']);

        }
        else if(MaladeAntecedants::where('id_antecedant',$id)->exists()) {
            return response()->json(['status' => 0, 'error' => "l'antécédant ne peut pas etre supprimer car un Malade est affecter"]);

        }else{

            return response()->json(['status' => 404, 'error' => 'Error antécédant n existes pas  ']);

        }
    }
}
