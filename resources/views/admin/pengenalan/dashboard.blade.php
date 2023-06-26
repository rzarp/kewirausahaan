@extends('admin.base')
@section('blok1')
@section('title','Blok1')
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
                            <p class="small">Pengenalan Tempat Usaha</p>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Provinsi</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>--Pilih salah satu--</option>
                                                <option>Jawa Barat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kabupaten/kota *)</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>--Pilih salah satu--</option>
                                                <option>Depok</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kecamatan</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>--Pilih salah satu--</option>
                                                <option>Tapos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kelurahan/Desa/Nagari *)</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>--Pilih salah satu--</option>
                                                <option>Cilangkap</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Satuan Lingkungan Setempat(SLS)</label>
                                            <input type="text" class="form-control" placeholder="SLS">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nomor Urut Usaha</label>
                                            <input type="number" class="form-control" placeholder="Nomor Urut Usaha">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama Usaha/Perusahaan</label>
                                            <input type="number" class="form-control" placeholder="Nomor Urut Usaha">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Data Tempat Usaha :</label>
                                        </div>

                                        <div class="form-group ">
                                            <label>Alamat tempat usaha</label>
                                            <input type="text" class="form-control" placeholder="Alamat tempat usaha">
                                       </div>

                                       <div class="form-group ">
                                            <label>No Telepon</label>
                                            <input type="number" class="form-control" placeholder="No Telepon">
                                        </div>
                                        <div class="form-group ">
                                            <label>No Hp</label>
                                            <input type="number" class="form-control" placeholder="No Hp">
                                        </div>
                                        <div class="form-group ">
                                            <label>Email</label>
                                            <input type="emailsws" class="form-control" placeholder="Email">
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
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
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
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
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
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
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