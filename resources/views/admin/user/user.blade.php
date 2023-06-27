@extends('admin.base')
@section('title', 'Data master user')
@section('user')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Input Data Untuk Blok I</h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Input Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Blok</span> 
                                <span class="fw-light">
                                    I
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="number" class="form-control" placeholder="NIK">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="name" class="form-control" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Passoword">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label>Status</label><br>
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                                                <span class="form-radio-sign">Aktif</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                                                <span class="form-radio-sign">Tidak Aktif</span>
                                            </label>
                                        </div>
                                    </div>
                                    

                                    
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th style="width: 10%">Status</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                        <th>NIK</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <tr>
                            <td>00000123123123132</td>
                            <td>rzarp</td>
                            <td>Reza</td>
                            <td>Aktif</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection