@extends('admin.base')
@section('indikator')
@section('title','indikator')
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
                        <a href="{{route('indikator.create')}}" class="btn btn-primary btn-sm btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Insert data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">indikator</th>
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
          ajax: "{{ route('indikator.show') }}",
          columns: [
              {
                  data: 'DT_RowIndex',
                  name: 'DT_RowIndex'
              },
              {
                  data: 'indikator',
                  name: 'indikator',
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
