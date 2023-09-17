@extends('admin.base')
@section('sumber-create')
@section('title','sumber create')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Sumber</h4>
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
                <a href="#">sumber</a>
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
                        <div class="card-title">Sumber</div>
                        <a href="{{route('sumber.all')}}" class="btn btn-primary btn-sm btn-round ml-auto">
                            <i class="fa fa-arrow-left"></i>
                                kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('sumber.post') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body">
                        <div class="form-group">
                            <label for="indikator">Sumber</label>
                            <input type="text" class="form-control" name="sumber">
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
