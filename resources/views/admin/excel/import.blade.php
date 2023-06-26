@extends('admin.base')
@section('import-excel')
@section('title','Import-Excel')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Multiple Upload</h4>
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
                <a href="#">Forms</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Upload</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Import Excel</div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="formFile" class="form-label">Import FIle Excel Anda</label>
                <input class="form-control" type="file" id="formFile">
            </div>
        </div>
        <div class="card-action">
            <button class="btn btn-success">Submit</button>
            <button class="btn btn-danger">Cancel</button>
        </div>
    </div>
</div>
@endsection