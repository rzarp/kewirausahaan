<?php

namespace App\Http\Controllers;

use App\Models\Pengenalan;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class PengenalanController extends Controller
{
   
    public function index()
    {
        $provinces = Province::all();
        return view('admin.pengenalan.dashboard', compact('provinces'));
    }

    public function getkabupaten(request $request) {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>Pilih Kabupaten...</option>";
        foreach ($kabupatens as $kabupaten) {
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function getkecamatan(request $request) {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option>Pilih Kecamatan...</option>";
        foreach ($kecamatans as $kecamatan) {
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }

        echo $option;
    }

    public function getdesa(request $request) {
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option>Pilih Desa...</option>";
        foreach ($desas as $desa) {
            $option.= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }


 
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
