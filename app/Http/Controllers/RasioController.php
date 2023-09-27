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
use RealRashid\SweetAlert\Facades\Alert;

use App\Exports\RasioExport;
use App\Exports\RasioExportID;
use Maatwebsite\Excel\Facades\Excel;


class RasioController extends Controller
{

    public function index()
    {
        $rasio = Rasio::all();
        return view('admin.rasio.rasio',compact('rasio'));
    }

    public function getFormulaById($id = "aa")
    {
        $formula = Formula::find($id);
        $data = [];
        $data['id'] = $formula->id;
        $data['nama_formula'] = $formula->nama_formula;
        foreach (json_decode($formula->uppper) as $key => $value) {
            if ($key % 2 == 0) {
                $data['rumusUpper'][$key] = Indikator::find($value)->indikator;
            }else{
                $data['rumusUpper'][$key] = $value;
            }
        }
        foreach (json_decode($formula->lower) as $key => $value) {
            if ($key % 2 == 0) {
                $data['rumusLower'][$key] = Indikator::find($value)->indikator;
            }else{
                $data['rumusLower'][$key] = $value;
            }
        }
        return response()->json($data, 200);
    }


    public function create()
    {
        $sumber = Sumber::all();
        $formula = Formula::all();
        return view('admin.rasio.rasio-create', compact('sumber', 'formula'));
    }


    public function store(Request $request)
    {
        // return $request;

        $rasio = new Rasio();
        $rasio->nama_rasio = $request->nama_rasio;
        $rasio->id_sumber = $request->id_sumber;
        $rasio->sumber = $request->sumber;
        $rasio->cut_off_data = $request->cut_off_date;
        $rasio->id_formula = $request->id_formula;

        $formula = Formula::find($request->id_formula);
        $operator = [];
        $upperForm = $request->upper[0];
        $lowerForm = $request->lower[0];
        $upperFull = [$upperForm];
        $lowerFull = [$lowerForm];

        $iterator = 1;
        foreach (json_decode($formula->uppper) as $key => $value) {
            if ($key % 2 == 1) {
                array_push($operator, $value);
                switch ($value) {
                    case '+':
                        $upperForm = $upperForm + $request->upper[$iterator];
                        break;
                    case '-':
                        $upperForm = $upperForm - $request->upper[$iterator];
                        break;
                    case '/':
                        $upperForm = $upperForm / $request->upper[$iterator];
                        break;
                    case '*':
                        $upperForm = $upperForm * $request->upper[$iterator];
                        break;
                }
                array_push($upperFull, $value);
                array_push($upperFull, $request->upper[$iterator]);

                $iterator++;
            }
        }

        $iterator = 1;

        foreach (json_decode($formula->lower) as $key => $value) {
            if ($key % 2 == 1) {
                array_push($operator, $value);
                switch ($value) {
                    case '+':
                        $lowerForm = $lowerForm + $request->lower[$iterator];
                        break;
                    case '-':
                        $lowerForm = $lowerForm - $request->lower[$iterator];
                        break;
                    case '/':
                        $lowerForm = $lowerForm / $request->lower[$iterator];
                        break;
                    case '*':
                        $lowerForm = $lowerForm * $request->lower[$iterator];
                        break;
                }
                array_push($lowerFull, $value);
                array_push($lowerFull, $request->lower[$iterator]);
                $iterator++;
            }
        }

        $rasio->upper = json_encode($upperFull);
        $rasio->lower = json_encode($lowerFull);

        $rasio->rasio = $upperForm / $lowerForm;
        $pesan = "";
        if ($rasio->save()) {
            Alert::success('Success', 'Data Berhasil Simpan');
            $pesan = 'Data berhasil disimpan';
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
            $pesan = 'Data gagal disimpan';
        }
        return redirect(route('rasio.all'))->with('pesan' , $pesan);


    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            // $data = DB::table('formulas')->selectRaw('id, nama_formula, concat(uppper, "|", lower) as formula, created_at, updated_at')->where('deleted_at','=',null)->get();
            $data = Rasio::all();
            return Datatables::of($data)
                    ->editColumn('id_formula', function ($row) {
                        $formula = Formula::find($row->id_formula);

                        return $formula->nama_formula;
                    })
                    ->editColumn('id_sumber', function ($row) {
                        $formula = Sumber::find($row->id_sumber);

                        return $formula->sumber;
                    })
                    ->editColumn('created_at', function ($row) {
                        return date("Y/m/d H:i:s", strtotime($row->created_at));
                    })
                    ->editColumn('updated_at', function ($row) {
                        return date("Y/m/d H:i:s", strtotime($row->updated_at));
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {

                        $btn =

                           '
                           <a href="'.route('rasio.edit',['id' => $row->id]).'" class="btn btn-primary btn-sm btn-action edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                           <a href="'.route('rasio.view',['id' => $row->id]).'" class="btn btn-success btn-sm btn-action view-confirm" data-toggle="tooltip" title="" data-original-title="View" ><i class="fas fa-eye"></i></a>
                           <a href="'.route('rasio.destroy',['id' => $row->id]).'" class="btn btn-danger btn-sm btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
                           <a href="'.route('rasio.export_id',['id' => $row->id]).'" class="btn btn-primary btn-sm btn-action mt-1 download-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-download"></i></a>
                           ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.rasio.rasio');
    }


    public function edit($id)
    {
        $sumber = Sumber::all();
        $formula = Formula::all();
        $rasio = Rasio::find($id);
        $rasio->upper = json_decode($rasio->upper);
        $rasio->lower = json_decode($rasio->lower);

        return view('admin.rasio.rasio-edit', compact('rasio','sumber', 'formula'));
    }

    public function view($id)
    {
        $sumber = Sumber::all();
        $formula = Formula::all();
        $rasio = Rasio::find($id);
        $rasio->upper = json_decode($rasio->upper);
        $rasio->lower = json_decode($rasio->lower);
        // return response()->json($rasio->upperName(), 200);

        return view('admin.rasio.rasio-view', compact('rasio','sumber', 'formula'));
    }


    public function update(Request $request, $id)
    {
        $rasio = Rasio::find($id);

        $rasio->nama_rasio = $request->nama_rasio;
        $rasio->id_sumber = $request->id_sumber;
        $rasio->sumber = $request->sumber;
        $rasio->cut_off_data = $request->cut_off_date;

        $formula = Formula::find($rasio->id_formula);
        $operator = [];
        $upperForm = $request->upper[0];
        $lowerForm = $request->lower[0];
        $upperFull = [$upperForm];
        $lowerFull = [$lowerForm];

        $iterator = 1;
        foreach (json_decode($formula->uppper) as $key => $value) {
            if ($key % 2 == 1) {
                array_push($operator, $value);
                switch ($value) {
                    case '+':
                        $upperForm = $upperForm + $request->upper[$iterator];
                        break;
                    case '-':
                        $upperForm = $upperForm - $request->upper[$iterator];
                        break;
                    case '/':
                        $upperForm = $upperForm / $request->upper[$iterator];
                        break;
                    case '*':
                        $upperForm = $upperForm * $request->upper[$iterator];
                        break;
                }
                array_push($upperFull, $value);
                array_push($upperFull, $request->upper[$iterator]);

                $iterator++;
            }
        }

        $iterator = 1;

        foreach (json_decode($formula->lower) as $key => $value) {
            if ($key % 2 == 1) {
                array_push($operator, $value);
                switch ($value) {
                    case '+':
                        $lowerForm = $lowerForm + $request->lower[$iterator];
                        break;
                    case '-':
                        $lowerForm = $lowerForm - $request->lower[$iterator];
                        break;
                    case '/':
                        $lowerForm = $lowerForm / $request->lower[$iterator];
                        break;
                    case '*':
                        $lowerForm = $lowerForm * $request->lower[$iterator];
                        break;
                }
                array_push($lowerFull, $value);
                array_push($lowerFull, $request->lower[$iterator]);
                $iterator++;
            }
        }

        $rasio->upper = json_encode($upperFull);
        $rasio->lower = json_encode($lowerFull);

        $rasio->rasio = $upperForm / $lowerForm;

        if ($rasio->save()) {
            Alert::success('Success', 'Data Berhasil Simpan');
            $pesan = 'Data berhasil disimpan';
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
            $pesan = 'Data gagal disimpan';
        }
        return redirect(route('rasio.all'))->with('pesan' , $pesan);
    }


    public function destroy($id)
    {
        $rasio = Rasio::find($id);

        if ($rasio->delete()) {
            Alert::success('Success', 'Data Berhasil Dihapus');
        } else {
            Alert::error('Error', 'Data Tidak terhapus');
        }
        return redirect()->back();
    }

    public function export() {
        return Excel::download(new RasioExport, 'rasio.xlsx');
    }
    public function export_id($id) {
        return Excel::download(new RasioExportID($id), 'rasio.xlsx');
    }
}
