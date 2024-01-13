@extends('admin.base')
@section('title', 'Restore master user')
@section('restore-user')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Restore User</h4>
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
                <a href="#">Data master</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Restore</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">restore data user</h4>

                    </div>
                    <div class="pull-right">
                        <a href="{{ url('user/delete/user') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                            Delete All
                        </a>

                        <a href="{{ url('user/restore/user') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-undo-alt"></i>
                            Restore All
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>status user</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @if($restore->isEmpty())
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="8">Tidak ada data yang dapat di restore</td>
                                </tr>
                            </tbody>
                            @else
                            @foreach($restore as $r)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->username}}</td>
                                    <td>{{$r->password}}</td>
                                    <td>{{$r->email}}</td>
                                    <td>{{$r->role}}</td>
                                    <td>{{$r->status_user}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                                Delete All
                                            </button> &nbsp
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                                Delete All
                                            </button>


                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
