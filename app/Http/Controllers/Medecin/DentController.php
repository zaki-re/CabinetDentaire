<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Models\Dent;
use Illuminate\Http\Request;

class DentController extends Controller
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
    public function destroy(Dent $dent)
    {
        //
    }
}
