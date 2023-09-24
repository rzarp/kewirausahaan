<?php

namespace App\Http\Controllers;

use App\Models\Rasio;
use App\Models\Indikator;
use App\Models\Sumber;
use App\Models\Formula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{



    public function index(Request $request)
    {

        $user = User::count();
        $rasio_all = Rasio::count();
        $chart = Rasio::all();
        $information1 = Rasio::selectRaw('nama_rasio, count(id) as total')->groupBy('nama_rasio')->get();
        $formula = Formula::all();
        $formulas= [];
        foreach ($formula as $key => $value) {
            if (count($value->getRasioDataChart()) > 0) {
                array_push($formulas, [
                    'label' => $value->nama_formula,
                    'data' => $value->getRasioDataChart()[0]
                ]);
            }
        };

        // return $information2;

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

                           ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.dashboard',compact('information1','user','rasio_all','chart', 'formulas'));
    }


}
