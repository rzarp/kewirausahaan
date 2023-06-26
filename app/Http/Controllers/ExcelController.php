<?php

namespace App\Http\Controllers;

use App\Models\Excel;
use Illuminate\Http\Request;
use App\Models\User;

class ExcelController extends Controller
{
   
    public function index()
    {
        return view('admin.excel.import');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

   
    public function show(Excel $excel)
    {
        //
    }

   
    public function edit(Excel $excel)
    {
        //
    }


    public function update(Request $request, Excel $excel)
    {
        //
    }


    public function destroy(Excel $excel)
    {
        //
    }
}
