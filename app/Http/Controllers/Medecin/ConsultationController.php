<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationMalade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medecin.type_consultation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Consultation::where('id_medecin',Auth::user()->id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Consultation::where('id',$id)->exists() && !ConsultationMalade::where('id_consultation',$id)->exists() ){
            $antecedant = Consultation::findOrFail($id);
            $antecedant->delete();
            return response()->json(['status' => 200, 'error' => 'Consultation Supprimer avec succés']);

        }
        else if(ConsultationMalade::where('id_antecedant',$id)->exists()) {
            return response()->json(['status' => 0, 'error' => "la Consultation ne peut pas etre supprimer car un Malade est affecter"]);

        }else{

            return response()->json(['status' => 404, 'error' => 'Error Consultation n existes pas  ']);

        }
    }
}
