<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;
use Auth;

class FormulaController extends Controller
{

    public function index()
    {
        $formula = Formula::all();
        return view('admin.formula.formula',compact('formula'));
    }


    public function create()
    {
        $indikator = Indikator::all();
        $formula = Formula::all();
        return view('admin.formula.formula-create',compact('indikator','formula'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Formula::all();
            return Datatables::of($data)
                    ->editColumn('created_at', function ($formula) {
                        return [
                        'display' => e($formula->created_at->format('d/m/Y H:i:s')),
                        'timestamp' => $formula->created_at->timestamp
                        ];
                    })
                    ->editColumn('updated_at', function ($formula) {
                        return [
                        'display' => ($formula->updated_at->format('d/m/Y H:i:s')),
                        'timestamp' => $formula->updated_at->timestamp
                        ];
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {

                        $btn =

                           '

                           ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.formula.formula');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function edit(Formula $formula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formula $formula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formula $formula)
    {
        //
    }
}
