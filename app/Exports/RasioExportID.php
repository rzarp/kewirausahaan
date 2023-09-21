<?php

namespace App\Exports;
use App\Models\Rasio;
use App\Models\Indikator;
use App\Models\Formula;
use App\Models\Sumber;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;

class RasioExportID implements FromView
{

    use Exportable;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View {

        $rasio = Rasio::where('id', $this->id)->get();
        return view('admin.export.export-rasio-id', [
            'rasio' => $rasio,
        ]);
    }
}
