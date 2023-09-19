<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;


class FormulaController extends Controller
{

    public function index()
    {
        $formula = DB::table('formulas')->selectRaw('id, nama_formula, concat(uppper, "|", lower) as formula, timestamp(created_at), timestamp(updated_at)')->get();
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
        $formula = new Formula();
        $formula->nama_formula = $request->nama_formula;
        $formula->uppper = json_encode(array_filter($request->upper, function($d){
            return !($d == "none");
        }));

        $formula->lower = json_encode(array_filter($request->lower, function($d){
            return !($d == "none");
        }));

        $pesan = "";
        if ($formula->save()) {
            Alert::success('Success', 'Data Berhasil Simpan');
            $pesan = 'Data berhasil disimpan';
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
            $pesan = 'Data gagal disimpan';
        }
        return redirect(route('formula.all'))->with('pesan' , $pesan);

    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('formulas')->selectRaw('id, nama_formula, concat(uppper, "|", lower) as formula, created_at, updated_at')->where('deleted_at','=',null)->get();
            return Datatables::of($data)
                    ->editColumn('formula', function ($formula) {
                        $arrUperLower = explode("|", $formula->formula);
                        $upper = json_decode($arrUperLower[0]);
                        $lower = json_decode($arrUperLower[1]);
                        $rumus = "";

                        foreach ($upper as $key => $u) {
                            $indikator = Indikator::where('id', '=', $u)->get();
                            if (count($indikator) < 1) {
                                $rumus = $rumus." ".$u;
                                continue;
                            }
                            $rumus = $rumus." ".$indikator[0]->indikator;
                        }

                        $rumus = $rumus." / ";

                        foreach ($lower as $key => $l) {
                            $indikator = Indikator::where('id', '=', $l)->get();
                            if (count($indikator) < 1) {
                                $rumus = $rumus." ".$l;
                                continue;
                            }
                            $rumus = $rumus." ".$indikator[0]->indikator;
                        }

                        return $rumus;
                    })
                    ->editColumn('created_at', function ($formula) {
                        return date("Y/m/d H:i:s", strtotime($formula->created_at));
                    })
                    ->editColumn('updated_at', function ($formula) {
                        return date("Y/m/d H:i:s", strtotime($formula->updated_at));
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {

                        $btn =

                           '
                           <a href="'.route('formula.edit',['id' => $row->id]).'" class="btn btn-sm btn-primary btn-action mr-1 edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                           <a href="'.route('formula.destroy',['id' => $row->id]).'" class="btn btn-sm btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
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
    public function edit($formula)
    {
        $formula = Formula::find($formula);
        $indikator = Indikator::all();
        return view('admin.formula.formula-edit',compact('formula', 'indikator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedBy = auth()->user()->id;

        // return $request;
        $formula = DB::table('formulas')
            ->where('id', $id)
            ->update([
                'nama_formula' => $request->nama_formula,
                'updated_by' => $updatedBy,
                'uppper' => json_encode(array_filter($request->upper, function($d){
                    return !($d == "none");
                })),
                'lower' => json_encode(array_filter($request->lower, function($d){
                    return !($d == "none");
                }))
            ]);
        if ($formula) {
            Alert::success('Success', 'Data Berhasil Simpan');
            $pesan = 'Data berhasil disimpan';
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
            $pesan = 'Data gagal disimpan';
        }

        return redirect(route('formula.all'))->with('pesan' , 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formula = Formula::find($id);

        if ($formula->delete()) {
            Alert::success('Success', 'Data Berhasil Dihapus');
        } else {
            Alert::error('Error', 'Data Tidak terhapus');
        }
        return redirect()->back();
    }
}
