<?php

namespace App\Http\Controllers;

use App\Models\Pengenalan;
use Illuminate\Http\Request;

class PengenalanController extends Controller
{
   
    public function index()
    {
        return view('admin.pengenalan.dashboard');
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
     * @param  \App\Models\Pengenalan  $pengenalan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengenalan $pengenalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengenalan  $pengenalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengenalan $pengenalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengenalan  $pengenalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengenalan $pengenalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengenalan  $pengenalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengenalan $pengenalan)
    {
        //
    }
}
