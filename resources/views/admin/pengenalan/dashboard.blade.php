@extends('admin.base')
@section('blok1')
@section('title','Blok1')
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

     <!-- Modal insert -->
     <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form action="{{ route('pengenalan.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Provinsi</label>
                                        <select name="provinsi" class="form-control" id="provinsi">
                                            <option>--Pilih Provinsi --</option>
                                            @foreach ($provinces as $provinsi)
                                                <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kabupaten/kota *)</label>
                                        <select name="kabupaten" class="form-control" id="kabupaten">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kecamatan</label>
                                        <select name="kecamatan" class="form-control" id="kecamatan">


                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kelurahan/Desa/Nagari *)</label>
                                        <select name="kelurahan" class="form-control" id="desa">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Satuan Lingkungan Setempat(SLS)</label>
                                        <input name="sls" type="text" class="form-control" placeholder="SLS">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nomor Urut Usaha</label>
                                        <input name="no_urut_usaha" type="text" class="form-control" placeholder="Nomor Urut Usaha">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Usaha/Perusahaan</label>
                                        <input name="nama_usaha" type="text" class="form-control" placeholder="Nomor Urut Usaha">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Data Tempat Usaha :</label>
                                    </div>

                                    <div class="form-group ">
                                        <label>Alamat tempat usaha</label>
                                        <input name="alamat_usaha" type="text" class="form-control" placeholder="Alamat tempat usaha">
                                    </div>

                                    <div class="form-group ">
                                        <label>No Telepon</label>
                                        <input name="no_telp" type="number" class="form-control" placeholder="No Telepon">
                                    </div>
                                    <div class="form-group ">
                                        <label>No Hp</label>
                                        <input name="no_hp" type="number" class="form-control" placeholder="No Hp">
                                    </div>
                                    <div class="form-group ">
                                        <label>Email</label>
                                        <input name="email" type="emailsws" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group ">
                                        <label>Tahun</label>
                                        <input name="tahun" type="date" class="form-control" placeholder="Tahun">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button id="exampleModal" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

          <!-- Modal  Edit -->
     <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form action="" method="post" id="form-edit" enctype="multipart/form-data" class="form-horizontal">
                        @method('PUT')
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Provinsi</label>
                                        <select name="provinsi" class="form-control" id="edit-provinsi">
                                            <option>--Pilih Provinsi --</option>
                                            @foreach ($provinces as $provinsi)
                                                <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kabupaten/kota *)</label>
                                        <select name="kabupaten" class="form-control" id="edit-kabupaten">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kecamatan</label>
                                        <select name="kecamatan" class="form-control" id="edit-kecamatan">


                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kelurahan/Desa/Nagari *)</label>
                                        <select name="kelurahan" class="form-control" id="edit-desa">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Satuan Lingkungan Setempat(SLS)</label>
                                        <input name="sls" type="text" class="form-control" placeholder="SLS" id="edit-sls">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nomor Urut Usaha</label>
                                        <input name="no_urut_usaha" type="text" class="form-control" placeholder="Nomor Urut Usaha" id="edit-urut">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Usaha/Perusahaan</label>
                                        <input name="nama_usaha" type="text" class="form-control" placeholder="Nama Usaha/Perusahaan" id="edit-perusahaan">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Data Tempat Usaha :</label>
                                    </div>

                                    <div class="form-group ">
                                        <label>Alamat tempat usaha</label>
                                        <input name="alamat_usaha" type="text" class="form-control" placeholder="Alamat tempat usaha" id="edit-alamat">
                                    </div>

                                    <div class="form-group ">
                                        <label>No Telepon</label>
                                        <input name="no_telp" type="number" class="form-control" placeholder="No Telepon" id="telpon">
                                    </div>
                                    <div class="form-group ">
                                        <label>No Hp</label>
                                        <input name="no_hp" type="number" class="form-control" placeholder="No Hp" id="edit-hp">
                                    </div>
                                    <div class="form-group ">
                                        <label>Email</label>
                                        <input name="email" type="emailsws" class="form-control" placeholder="Email" id="edit-email">
                                    </div>
                                    <div class="form-group ">
                                        <label>Tahun</label>
                                        <input name="tahun" type="date" class="form-control" placeholder="Tahun" id="edit-tahun">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button id="exampleModal" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>SLS</th>
                                    <th>No urut usaha</th>
                                    <th>Nama usaha</th>
                                    <th>Alamat usaha</th>
                                    <th>No Telpon</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Tahun</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @if($pengenalan->isEmpty())
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="8">Data Tidak Ada</td>
                                </tr>
                            </tbody>
                            @else
                            @foreach($pengenalan as $p)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $p->get_provinsi()->name }}</td>
                                        <td>{{ $p->get_kabupaten()->name }}</td>
                                        <td>{{ $p->get_kecamatan()->name }}</td>
                                        <td>{{ $p->get_kelurahan()->name }}</td>
                                        <td>{{ $p->sls }}</td>
                                        <td>{{ $p->no_urut_usaha }}</td>
                                        <td>{{ $p->nama_usaha }}</td>
                                        <td>{{ $p->alamat_usaha }}</td>
                                        <td>{{ $p->no_telp }}</td>
                                        <td>{{ $p->no_hp }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->tahun }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button value="{{$p->id}}" class="btn btn-link btn-primary btn-lg" onclick="editmodal('{{$p->id}}')">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <form action="{{ url('/blok1') }}/dashboard/delete/{{ $p->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-link btn-danger btn-lg" data-confirm-delete="true">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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

@push('script')
    <script>
        $(function () {
           $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
           });

        //    provinsi
           $(function() {
                $('#provinsi').on('change', function(){
                    let id_provinsi = $('#provinsi').val();

                    $.ajax({
                        type: 'POST',
                        url : "{{route('getkabupaten')}}",
                        data : {id_provinsi:id_provinsi},
                        cache : false,

                        success: function(msg) {
                            $('#kabupaten').html(msg);
                            $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data) {
                            console.log('error',data)
                        },
                    })
                    // console.log(id_provinsi);
                });
           })

        //    kabupaten
           $(function() {
                $('#kabupaten').on('change', function(){
                    let id_kabupaten = $('#kabupaten').val();

                    $.ajax({
                        type: 'POST',
                        url : "{{route('getkecamatan')}}",
                        data : {id_kabupaten:id_kabupaten},
                        cache : false,

                        success: function(msg) {
                            $('#kecamatan').html(msg);
                            $('#desa').html('');

                        },
                        error: function(data) {
                            console.log('error',data)
                        },
                    })
                    // console.log(id_provinsi);
                });
           });

        //    kecamatan
           $(function() {
                $('#kecamatan').on('change', function(){
                    let id_kecamatan = $('#kecamatan').val();

                    $.ajax({
                        type: 'POST',
                        url : "{{route('getdesa')}}",
                        data : {id_kecamatan:id_kecamatan},
                        cache : false,

                        success: function(msg) {
                            $('#desa').html(msg);

                        },
                        error: function(data) {
                            console.log('error',data)
                        },
                    })
                    // console.log(id_provinsi);
                });
           });
        });
    </script>


<script type="text/javascript">

      function editmodal(id) {
        $.get('dashboard/edit/'+id, function (data) {
                $('#editModal').modal('show');
                $('#form-edit').attr('action','dashboard/update/'+id);
                $('#edit-provinsi')[0].value = data.provinsi;
                $('#edit-kabupaten')[0].value = data.kabupaten;
                $('#edit-kecamatan')[0].value = data.kecamatan;
                $('#edit-desa')[0].value = data.kelurahan;
                $('#edit-sls')[0].value = data.sls;
                $('#edit-urut')[0].value = data.no_urut_usaha;
                $('#edit-perusahaan')[0].value = data.nama_usaha;
                $('#edit-alamat')[0].value = data.alamat_usaha;
                $('#telpon')[0].value = data.no_telp;
                $('#edit-hp')[0].value = data.no_hp;
                $('#edit-email')[0].value = data.email;
                $('#edit-tahun')[0].value = data.tahun;
                console.log(data.name);
            })
      }
      $(document).ready(function () {

      });

  </script>
@endpush
