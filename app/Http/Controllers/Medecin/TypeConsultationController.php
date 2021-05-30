<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeConsultationRequest;
use App\Models\TypeConsultation;
use App\Models\TypeConsultationMalade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeConsultationController extends Controller
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
    public function store(TypeConsultationRequest $request)
    {
        return TypeConsultation::create([
            'type'=>$request->type,
            'id_medecin'=>Auth::user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeConsultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return TypeConsultation::where('id_medecin',Auth::user()->id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeConsultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeConsultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeConsultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeConsultation $consultation)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeConsultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(TypeConsultation::where('id',$id)->exists() && !TypeConsultationMalade::where('id_consultation',$id)->exists() ){
            $antecedant = TypeConsultation::findOrFail($id);
            $antecedant->delete();
            return response()->json(['status' => 200, 'error' => 'Consultation Supprimer avec succés']);

        }
        else if(TypeConsultationMalade::where('id_antecedant',$id)->exists()) {
            return response()->json(['status' => 0, 'error' => "la Consultation ne peut pas etre supprimer car un Malade est affecter"]);

        }else{

            return response()->json(['status' => 404, 'error' => 'Error Consultation n existes pas  ']);

        }
    }
}
