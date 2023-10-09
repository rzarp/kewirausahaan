@extends('admin.base')
@section('rasio-edit')
@section('title','Rasio edit')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Rasio</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">indikator dan formula</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">formula</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">

            @if (session()->has('pesan'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session()->get('pesan') }}
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="card-title">Rasio</div>
                        <a href="{{route('rasio.all')}}" class="btn btn-primary btn-sm btn-round ml-auto">
                            <i class="fa fa-arrow-left"></i>
                                kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('rasio.update', $rasio->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body">
                        <div class="form-group">
                            <label for="formula">Nama Rasio</label>
                            <input type="text" class="form-control" name="nama_rasio" value="{{ old('nama_rasio', $rasio->nama_rasio) }}">
                        </div>
                        <div class="form-group">
                            <label for="formula">Nama Sumber</label>
                            <select name="id_sumber" class="form-control" id="">
                                @foreach($sumber as $i)
                                <option value="{{$i->id}}" {{old('id_sumber')==$i->id ? 'selected':''}}>{{$i->sumber}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="formula">Sumber</label>
                            <input type="text" class="form-control" name="sumber" value="{{ old('sumber', $rasio->sumber) }}">
                        </div>

                        <div class="form-group">
                            <label for="formula">Cut Off</label>
                            <input type="date" class="form-control" name="cut_off_date" value="{{ old('cut_off_date', $rasio->cut_off_data) }}">
                        </div>

                        <div class="form-group">
                            <label for="formula">Nama Formula</label>
                            <select name="id_formula" class="form-control" id="formula" disabled>
                                @foreach($formula as $i)
                                <option value="{{$i->id}}" {{$rasio->id_formula == $i->id ? 'selected':''}}>{{$i->nama_formula}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <div class="form-group" id="upper-area">
                                <label for="formula">Rasio - (Upper)</label>
                                {{-- {{ print_r($rasio->upper) }} --}}
                            </div>
                        </div>

                        <div>
                            <div class="form-group" id="lower-area">
                                <label for="formula">Rasio - (Lower)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-danger btn-sm" type="reset" value="Reset">Reset</button>
                            <button class="btn btn-primary btn-sm" type="submit">Input</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
$( document ).ready(function() {

    var formula = $('#formula');
    var upperOp = $('#upper-area');
    var lowerOp = $('#lower-area');

    var upperValue = {!! json_encode($rasio->upper) !!};
    var lowerValue = {!! json_encode($rasio->lower) !!};
    console.log(upperValue);

    var url = "{!! route('rasio.formulaId', $rasio->id_formula) !!}";
    console.log(url);
    $.get(url, function(response, data) {
        console.log(response.rumusUpper);
        var upper = response.rumusUpper;

        $.each(upper, (i, v) => {
            if (i % 2 == 0) {
                var upperElement =  '    <div class="d-flex">';
                    upperElement += '        <div class="w-75">';
                    upperElement += '            <label for="formula">'+v+'</label>';
                    upperElement += '        </div>';
                    upperElement += '        <div class="w-25">';
                        upperElement += '            <input type="number" step=".01" class="form-control" name="upper[]" value="'+upperValue[i]+'" >';
                        upperElement += '        </div>';
                    upperElement += '    </div>';

                upperOp.append(upperElement);
                console.log(v);
            }
        });
    });
    $.get(url, function(response, data) {
        console.log(response.rumusLower);
        var lower = response.rumusLower;

        $.each(lower, (i, v) => {
            if (i % 2 == 0) {
                var lowerElement =  '    <div class="d-flex">';
                    lowerElement += '        <div class="w-75">';
                    lowerElement += '            <label for="formula">'+v+'</label>';
                    lowerElement += '        </div>';
                    lowerElement += '        <div class="w-25">';
                        lowerElement += '            <input type="number" step=".01" class="form-control" name="lower[]" value="'+lowerValue[i]+'" >';
                        lowerElement += '        </div>';
                    lowerElement += '    </div>';

                lowerOp.append(lowerElement);
                console.log(v);
            }
        });
    });

    // $.get(url, function(response, data) {
    //     console.log(response.rumusLower);
    //     var lower = response.rumusLower;

    //     $.each(lower, (i, v) => {
    //         if (i % 2 == 0) {
    //             // return;
    //             var lowerElement =  '    <div class="d-flex">';
    //                 lowerElement += '        <div class="w-75">';
    //                 lowerElement += '            <label for="formula">'+v+'</label>';
    //                 lowerElement += '        </div>';
    //                 lowerElement += '        <div class="w-25">';
    //                     lowerElement += '            <input type="number" class="form-control" name="lower[]">';
    //                     lowerElement += '        </div>';
    //                 lowerElement += '    </div>';

    //             lowerOp.append(lowerElement);
    //             console.log(v);
    //         }
    //     })

    // });
});

</script>
@endpush
