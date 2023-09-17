@extends('admin.base')
@section('indikator-edit')
@section('title','indikator edit')
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
                <form action="{{ route('formula.update', $formula->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body">
                        <div class="form-group">
                            <label for="formula">Nama Formula</label>
                            <input type="text" class="form-control" name="nama_formula" value="{{old('nama_formula')}}">
                        </div>

                        <div class="upper">
                            <div class="form-group">
                                <label for="formula">Formula - (Upper)</label>
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
                                <label for="formula">Formula - (Lower)</label>
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
        if (vtarget != 'none') {
            console.log(upperParent[0]);
            upperParent.clone(true).appendTo(upperParent.parent());
        }else{
            $('.upper-op').last().parent().parent().remove();
        }
    });

    lowerOp.change(function(event) {
        var vtarget = event.target.value;
        console.log(vtarget);
        if (vtarget != 'none') {
            console.log(lowerParent[0]);
            lowerParent.clone(true).appendTo(lowerParent.parent());
        }else{
            $('.lower-op').last().parent().parent().remove();
        }
    });
});
</script>





@endpush
