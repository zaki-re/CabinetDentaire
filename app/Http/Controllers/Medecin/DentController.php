<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DentRequest;
use App\Models\Dent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medecin.add_dent');
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
    public function store(DentRequest $request)
    {
        return  Dent::create([
            'numero'=>$request->numero,
            'id_medecin'=>Auth::user()->id,
            'emplacement'=>$request->emplacement,
            'dent'=> $request->dent,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dent  $dent
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Dent::get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dent  $dent
     * @return \Illuminate\Http\Response
     */
    public function edit(Dent $dent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dent  $dent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dent $dent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dent  $dent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Dent::where('id',$id)->where('id_medecin',Auth::user()->id)->exists() ){
            $antecedant = Dent::findOrFail($id);
            $antecedant->delete();
            return response()->json(['status' => 200, 'message' => 'Dent Supprimer avec succés']);

        }
        else{

            return response()->json(['status' => 404, 'error' => 'Error dent n existes pas  ']);

        }
    }
}
