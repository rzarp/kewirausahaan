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

class RasioExport implements FromView,ShouldAutoSize
{

    use Exportable;

    public function view(): View {
        return view('admin.export.export-rasio',[
            'rasio' => Rasio::all(),
        ]);
    }
}
