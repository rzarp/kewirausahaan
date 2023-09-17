<?php

namespace App\Http\Controllers;

use App\Models\Rasio;
use App\Models\Indikator;
use App\Models\Sumber;
use App\Models\Formula;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;
use Auth;

class RasioController extends Controller
{

    public function index()
    {
        $rasio = Rasio::all();
        return view('admin.rasio.rasio',compact('rasio'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Rasio $rasio)
    {
        //
    }


    public function edit(Rasio $rasio)
    {
        //
    }


    public function update(Request $request, Rasio $rasio)
    {
        //
    }


    public function destroy(Rasio $rasio)
    {
        //
    }
}
