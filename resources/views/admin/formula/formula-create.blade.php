@extends('admin.base')
@section('formula-create')
@section('title','formula create')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Formula</h4>
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
                        <div class="card-title">Formula</div>
                        <a href="{{route('formula.all')}}" class="btn btn-primary btn-sm btn-round ml-auto">
                            <i class="fa fa-arrow-left"></i>
                                kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('formula.post') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body">
                        <div class="form-group">
                            <label for="formula">Nama Formula</label>
                            <input type="text" class="form-control" name="nama_formula">
                        </div>

                        <div class="upper">
                            <div class="form-group">
                                <label for="formula">Formula - (Pembilang)</label>
                                <div class="d-flex">
                                    <div class="w-75">
                                        <select name="upper[]" class="form-control" id="">
                                            @foreach($indikator as $i)
                                                <option value="{{$i->id}}" {{old('indikator_id')==$i->id ? 'selected':''}}>{{$i->indikator}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-25">
                                        <select name="upper[]" class="form-control upper-op" id="">
                                            <option value="none">Tidak ada</option>
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                            <option value="*">*</option>
                                            <option value="/">/</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lower">
                            <div class="form-group">
                                <label for="formula">Formula - (Penyebut)</label>
                                <div class="d-flex">
                                    <div class="w-75">
                                        <select name="lower[]" class="form-control" id="exampleFormControlSelect2">
                                            @foreach($indikator as $i)
                                                <option value="{{$i->id}}" {{old('indikator_id')==$i->id ? 'selected':''}}>{{$i->indikator}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-25">
                                        <select name="lower[]" class="form-control lower-op" id="exampleFormControlSelect2">
                                            <option value="none">Tidak ada</option>
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                            <option value="*">*</option>
                                            <option value="/">/</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div> --}}
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
    var upperOp = $('.upper-op');
    var upperParent = upperOp.parent().parent();

    var lowerOp = $('.lower-op');
    var lowerParent = lowerOp.parent().parent();

    upperOp.change(function(event) {
        var vtarget = event.target.value;
        console.log(vtarget);
        var ini = $('.upper-op').index(event.target);
        var max = $('.upper-op').length;
        if (vtarget != 'none') {
            if ($('.upper-op')[ini +1]) {
                console.log($('.upper-op')[ini +1]);
                $('.upper-op')[ini + 1].parent().parent().remove();
            }

            upperParent.clone(true).appendTo(upperParent.parent());
        }else{
            while (max > ini) {
                console.log($('.upper-op').eq(max));
                $('.upper-op').eq(max).parent().parent().remove();
                max--;
            }
        }
    });

    lowerOp.change(function(event) {
        var vtarget = event.target.value;
        console.log(vtarget);
        var ini = $('.lower-op').index(event.target);
        var max = $('.lower-op').length;
        if (vtarget != 'none') {
            if ($('.lower-op')[ini +1]) {
                console.log($('.lower-op')[ini +1]);
                $('.lower-op')[ini + 1].parent().parent().remove();
            }
            lowerParent.clone(true).appendTo(lowerParent.parent());
        }else{
            while (max > ini) {
                console.log($('.upper-op').eq(max));
                $('.lower-op').eq(max).parent().parent().remove();
                max--;
            }
        }
    });
});

</script>
@endpush
