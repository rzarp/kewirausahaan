<?php

namespace App\Http\Controllers;

use App\Models\Sumber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;
use Auth;

class SumberController extends Controller
{

    public function index()
    {
        $sumber = Sumber::all();
        return view('admin.sumber.sumber',compact('sumber'));
    }

    public function create()
    {
        return view('admin.sumber.sumber-create');
    }


    public function store (Request $request)
    {
        $request->validate([
            'id' => Str::uuid()->toString(),
            'sumber' => 'required',
        ]);

        $sumber = new Sumber();
        $sumber->sumber = $request->sumber;
        $sumber->created_by = Auth::user()->id;
        $sumber->save();
        return redirect(route('sumber.create'))->with('pesan' , 'Data berhasil disimpan');
    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Sumber::all();
            return Datatables::of($data)
                    ->editColumn('created_at', function ($sumber) {
                        return [
                        'display' => e($sumber->created_at->format('d/m/Y H:i:s')),
                        'timestamp' => $sumber->created_at->timestamp
                        ];
                    })
                    ->editColumn('updated_at', function ($sumber) {
                        return [
                        'display' => ($sumber->updated_at->format('d/m/Y H:i:s')),
                        'timestamp' => $sumber->updated_at->timestamp
                        ];
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {

                        $btn =

                           '
                           <a href="'.route('sumber.edit',['id' => $row->id]).'" class="btn btn-sm btn-primary btn-action mr-1 edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                           <a href="'.route('sumber.destroy',['id' => $row->id]).'" class="btn btn-sm btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
                           ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.sumber.sumber');
    }


    public function edit($id) {
        $sumber = Sumber::find($id);
        return view('admin.sumber.sumber-edit',compact('sumber'));
    }



    public function update(Request $request, $id) {

        $updatedBy = auth()->user()->id;

        // return $request;
        DB::table('sumbers')
            ->where('id', $id)
            ->update([
                'sumber' => $request->sumber,
                'updated_by' => $updatedBy,
            ]);

            return redirect(route('sumber.create'))->with('pesan' , 'Data berhasil disimpan');
    }


    public function destroy($id)
    {
        $sumber = Sumber::find($id);
        $sumber->delete();
        return redirect()->back();
    }
}
