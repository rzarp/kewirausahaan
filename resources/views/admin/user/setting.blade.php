@extends('admin.base')
@section('setting')
@section('title','setting')


@php
    $user = $user ?? null;
    $action = route('setting.update');
@endphp

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Setting</h4>
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
                <a href="#">setting</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Setting</div>
                </div>
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="card-body">
                        <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Name <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Username" value="{{ $user ? $user->name : old('name') }}">
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Username <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="username-addon">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="username" aria-label="username" aria-describedby="username-addon" id="username" name="username" value="{{ $user ? $user->username : old('username') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email Address <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $user ? $user->email : old('email') }}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Upload Image <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <div class="input-file input-file-image">
                                    <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                                    <input type="file" class="form-control form-control-file" id="uploadImg" name="foto" accept="image/*">
                                    <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a Image</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit"> Submit </button>
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
