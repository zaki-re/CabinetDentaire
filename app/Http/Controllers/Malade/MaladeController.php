<?php

namespace App\Http\Controllers\Malade;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaladeCreateRequset;
use App\Models\Malade;
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
        return MaladeMedecin::create([
            'id_malade'=> $malade->id,
            'id_medecin'=>Auth::user()->id,
        ]);

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
