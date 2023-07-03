<?php

namespace App\Http\Controllers;

use App\Models\Pengenalan;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengenalanController extends Controller
{
   
    public function index()
    {
        $provinces = Province::all();
        $regency = Regency::all();
        $district = District::all();
        $village = Village::all();
        $pengenalan = Pengenalan::all();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.pengenalan.dashboard', compact('provinces','regency','district','village','pengenalan'));
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

   
    public function store (Request $request) 
    {
        $request->validate([
            'id' => Str::uuid()->toString(),
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'sls' => 'required',
            'no_urut_usaha' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tahun' => 'required',
        ]);

        $pengenalan = new Pengenalan();
        $pengenalan->provinsi = $request->provinsi;
        $pengenalan->kabupaten = $request->kabupaten;
        $pengenalan->kecamatan = $request->kecamatan;
        $pengenalan->kelurahan = $request->kelurahan;
        $pengenalan->sls = $request->sls;
        $pengenalan->no_urut_usaha = $request->no_urut_usaha;
        $pengenalan->nama_usaha = $request->nama_usaha;
        $pengenalan->alamat_usaha = $request->alamat_usaha;
        $pengenalan->no_telp = $request->no_telp;
        $pengenalan->no_hp = $request->no_hp;
        $pengenalan->email = $request->email;
        $pengenalan->tahun = $request->tahun;
        $pengenalan->save();


        // dd(request()->all());
        return redirect(route('pengenalan'))->with('pesan' , 'Data berhasil disimpan');

        
    }

   
    public function edit($id) {
        $pengenalan = Pengenalan::find($id);
        return $pengenalan;
    }

    public function update(Request $request, $id) {

        // return $request;
        DB::table('pengenalans')
            ->where('id', $id)
            ->update([
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'sls' => $request->sls,
                'no_urut_usaha' => $request->no_urut_usaha,
                'nama_usaha' => $request->nama_usaha,
                'alamat_usaha' => $request->alamat_usaha,
                'no_telp' => $request->no_telp,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'tahun' => $request->tahun,
                
            ]);

            return redirect(route('pengenalan'))->with('pesan' , 'Data berhasil disimpan');
    }

 
    public function destroy($id)
    {

        $pengenalan = Pengenalan::find($id);
        $pengenalan->delete();       
        return redirect()->back();
    }
}
