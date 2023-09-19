<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IndikatorController extends Controller
{
    public function index()
    {
        $indikator = Indikator::all();
        return view('admin.indikator.indikator',compact('indikator'));
    }


    public function create()
    {
        return view('admin.indikator.indikator-create');
    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Indikator::all();
            return Datatables::of($data)
                    ->editColumn('created_at', function ($indikator) {
                        return [
                        'display' => e($indikator->created_at->format('d/m/Y H:i:s')),
                        'timestamp' => $indikator->created_at->timestamp
                        ];
                    })
                    ->editColumn('updated_at', function ($indikator) {
                        return [
                        'display' => ($indikator->updated_at->format('d/m/Y H:i:s')),
                        'timestamp' => $indikator->updated_at->timestamp
                        ];
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {

                        $btn =

                           '
                           <a href="'.route('indikator.edit',['id' => $row->id]).'" class="btn btn-sm btn-primary btn-action mr-1 edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                           <a href="'.route('indikator.destroy',['id' => $row->id]).'" class="btn btn-sm btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
                           ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.indikator.indikator');
    }

    public function store (Request $request)
    {
        $request->validate([
            'id' => Str::uuid()->toString(),
            'indikator' => 'required',
        ]);

        $indikator = new Indikator();
        $indikator->indikator = $request->indikator;
        $indikator->created_by = Auth::user()->id;
        $indikator->save();

        if ($indikator->save()) {
            Alert::success('Success', 'Data Berhasil Simpan');
        } else {
            Alert::error('Error', 'Data Tidak Tersimpan');
        }
        return redirect(route('indikator.all'))->with('pesan' , 'Data berhasil disimpan');
    }


    public function edit($id) {
        $indikator = Indikator::find($id);
        return view('admin.indikator.indikator-edit',compact('indikator'));
    }

    public function update(Request $request, $id) {

        $updatedBy = auth()->user()->id;

        // return $request;
        DB::table('indikators')
            ->where('id', $id)
            ->update([
                'indikator' => $request->indikator,
                'updated_by' => $updatedBy,
            ]);

            return redirect(route('indikator.create'))->with('pesan' , 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        $indikator = Indikator::find($id);
        $indikator->delete();

        if ($indikator->delete()) {
            Alert::success('Success', 'Data Berhasil Dihapus');
        } else {
            Alert::error('Error', 'Data Tidak terhapus');
        }
        return redirect()->back();
    }
}
