@extends('admin.base')
@section('indikator-create')
@section('title','indikator create')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Indikator</h4>
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
                <a href="#">indikator</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="card-title">Indikator</div>
                        <a href="{{route('indikator.all')}}" class="btn btn-primary btn-sm btn-round ml-auto">
                            <i class="fa fa-arrow-left"></i>
                                kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('indikator.post') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body">
                        <div class="form-group">
                            <label for="indikator">Indikator</label>
                            <input type="text" class="form-control" name="indikator">
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






@endpush
