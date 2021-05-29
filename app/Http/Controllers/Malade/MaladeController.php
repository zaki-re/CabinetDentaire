<?php

namespace App\Http\Controllers\Malade;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaladeCreateRequset;
use App\Models\Malade;
use App\Models\MaladeAntecedants;
use App\Models\MaladeMedecin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaladeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function showProfile($id)
    {
        $malade=user::where('id',$id)->first();
        return view('malade.malade_profile')->with('malade',$malade);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('malade.add_malade');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaladeCreateRequset $request)
    {

        if (User::where('mobile',$request->mobile)->exists()){
            return response()->json(['status' => 0, 'error' => 'le numéro de telephone existe deja ']);

        }

       $malade= User::create([
           'nom'=>$request->nom,
           'prenom'=>$request->prenom,
           'mobile'=>$request->mobile,
           'address'=>$request->address,
           'age'=>$request->age,
            'type_user'=>'Malade',
            'id_med_mal'=>Auth::user()->id,
        ]);
         MaladeMedecin::create([
            'id_malade'=> $malade->id,
            'id_medecin'=>Auth::user()->id,
        ]);
         if($request->antecedants){
             foreach ($request->antecedants as $antecedant ){
                 MaladeAntecedants::create([
                     'id_medecin'=>Auth::user()->id,
                     'id_malade'=>$malade->id,
                     'id_antecedant' =>$antecedant,
                 ]);
             }
         }

        return response()->json(['status' => 200, 'message' => 'Malade Ajouter avec succès']);



    }
    public function nbrDeMalade(){
        return User::where('id_med_mal',Auth::user()->id)->count();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getMalade()
    {
        return User::where('id_med_mal',Auth::user()->id)->get();

    }
    /**
     * Display the template for histrique user resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHisotrique()
    {
        return view('medecin.historique_des_malades');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaladeCreateRequset $request, $id)
    {

        if(User::where('id',$id)->where('id_med_mal',Auth::user()->id)->exists()){
            $patient=User::findOrFail($id);
            $patient->nom= $request->nom;
            $patient->prenom = $request->prenom;
            $patient->age = $request->age;
            $patient->mobile = $request->mobile;
            $patient->address = $request->address;
            $patient->save();
            if(MaladeAntecedants::where('id_malade',$id)->where('id_medecin',Auth::user()->id)->exists()){
                MaladeAntecedants::where('id_malade',$id)->where('id_medecin',Auth::user()->id)->delete();
            }
            if($request->antecedants){
                foreach ($request->antecedants as $antecedant ){
                    MaladeAntecedants::create([
                        'id_medecin'=>Auth::user()->id,
                        'id_malade'=>$id,
                        'id_antecedant' =>$antecedant,
                    ]);
                }
            }
            return response()->json(['status' => 200, 'malade' => $patient]);

        }else {
            return response()->json(['status' => 0, 'errors' =>"on a pas pu trouver l'utilisateur "]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::where('id',$id)->where('id_med_mal',Auth::user()->id)->exists()){
            $malade = User::findOrFail($id);
            $malade->delete();
            if(MaladeAntecedants::where('id_malade',$id)->exists()){
                $maladeAntecedants = MaladeAntecedants::where('id_malade',$id)->get();
                foreach ($maladeAntecedants as $maladeAntecedant){
                    $maladeAntecedant->delete();
                }
            }
            return response()->json(['status' => 200, 'error' => 'Malade Supprimer avec succés']);

        }
        else {
            return response()->json(['status' => 404, 'error' => "Error Malade n'existes pas"]);

        }
    }
}
