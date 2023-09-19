@extends('admin.base')
@section('rasio')
@section('title','rasio')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Rasio</h4>
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
                <a href="#">Rasio</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">rasio</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="card-title">Rasio </div>  &nbsp
                        <div class="d-flex align-items-center">
                            <a href="{{route('rasio.create')}}" class="btn btn-primary btn-sm btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Insert data
                            </a> &nbsp
                            <a href="{{route('rasio.export')}}" class="btn btn-success btn-sm btn-round ml-auto">
                                <i class="fa fa-download"></i>
                                Download
                            </a>
                        </div>



                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive data-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nama rasio</th>
                                <th scope="col">sumber</th>
                                <th scope="col">nama sumber</th>
                                <th scope="col">id formula</th>
                                <th scope="col">rasio</th>
                                <th scope="col">cut off data</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

<script type="text/javascript">
    $(function () {

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('rasio.show') }}",
          columns: [
              {
                  data: 'DT_RowIndex',
                  name: 'DT_RowIndex'
              },
              {
                data: 'nama_rasio',
                name: 'nama_rasio'
              },
              {
                data: 'id_sumber',
                name: 'id_sumber'
              },
              {
                data: 'sumber',
                name: 'sumber'
              },
              {
                data: 'id_formula',
                name: 'id_formula'
              },
              {
                data: 'rasio',
                name: 'rasio'
              },
              {
                data: 'cut_off_data',
                name: 'cut_off_data'
              },
              {
                  data: 'action',
                  name: 'action',
                  orderable: false,
                  searchable: false
              },
          ]
      });

    });
  </script>

<script>
    $('body').on('click','.delete-confirm',function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Kamu Yakin ? ',
        text: "Hapus Data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus'
      }).then((result) => {
        if (result.value) {
          window.location.href = url;
        }
      })
    });
  </script>




@endpush
