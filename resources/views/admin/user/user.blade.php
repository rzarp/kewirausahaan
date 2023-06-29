@extends('admin.base')
@section('title', 'Data master user')
@section('user')

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tables</h4>
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
                <a href="#">Tables</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Basic Tables</a>
            </li>
        </ul>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="exampleModal" action="{{ route('user.post') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="name" class="form-control" placeholder="Nama" name="name">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">username</label>
                            <input type="username" class="form-control" placeholder="Username" name="username">
                            @error('username')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="role">Role</label>
                            
                            <select name="role" class="form-control form-control" id="defaultSelect">
                            @foreach($role as $r)
                                <option value="{{ $r }}" {{ (old ('role') == $r ) ? 'selected' : '' }}>{{ $r }}</option>
                            @endforeach
                            @error('role')
                                <div class="text-danger">
                                    {{ $message}}   
                                </div>
                            @enderror
                        </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button id="exampleModal" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Row</h4>
                   
                    <button type="btn btn-primary" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        Input Data
                    </button>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>



@endsection