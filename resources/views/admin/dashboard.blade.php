@extends('admin.base')
@section('dashboard')
@section('title', 'Dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Premium Bootstrap 4 Admin Dashboard</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <div class="card-category">Daily information about statistics in system</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-3 mb-0">New Users</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-3 mb-0">Sales</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                            <h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nama rasio</th>
                                <th scope="col">sumber</th>
                                <th scope="col">nama sumber</th>
                                <th scope="col">id formula</th>
                                <th scope="col">rasio</th>
                                <th scope="col">cut off data</th>
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
          ajax: "{{ route('dashboard') }}",
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

          ]
      });

    });
  </script>

  @endpush
