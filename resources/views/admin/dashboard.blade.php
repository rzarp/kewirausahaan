@extends('admin.base')
@section('dashboard')
@section('title', 'Dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Rasio</h2>
                <h5 class="text-white op-7 mb-2">Kementrian Koperasi dan UMKM</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                {{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a> --}}
                <a href="{{route('rasio.create')}}" class="btn btn-secondary btn-round">Add data Rasio</a>
            </div>
        </div>
    </div>
</div>


{{-- <div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-user text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Jumlah User</p>
                                <h4 class="card-title">{{ $user }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">

                        {{ dd($information2) }}
                        @foreach ($information1 as $info1)
                            <div class="col col-stats">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Rasio {{ $info1->nama_rasio }}</p>
                                    <h4 class="card-title">{{ $info1->total }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="row">
                @foreach ($information1 as $info1)
                <div class="col-sm-6 col-lg-4">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-secondary mr-3">
                                <i class="fa fa-dollar-sign"></i>
                            </span>
                            <div>
                                <h5 class="mb-1"><b><a href="#"><small>{{ $info1->nama_rasio }}</small></a></b></h5>
                                <small class="text-muted">{{ $info1->total }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title">Rasio</div>
                    </div>
                    <br>
                    <table class="table table-striped-responsive data-table">
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

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title">Rasio</div>
                        <select class="form-control" name="year" id="year">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                    <canvas id="myChart"></canvas>
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
                name: 'rasio',
                //     render: function (data, type, row) {
                //     if (type === 'display') {
                //         if (!isNaN(data)) { // Check if data is numeric
                //             return parseFloat(data).toFixed(3) + '%';
                //         } else {
                //             return 'N/A'; // or some other error message
                //         }
                //     }
                //     return data;
                // }
              },
              {
                data: 'cut_off_data',
                name: 'cut_off_data'
              },

          ]
      });

    });
  </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = @json($chart);


    // var labels = data.map(function(item) {
    //     // Ubah format tanggal ke "tanggal-bulan-tahun"
    //     var cutOffData = new Date(item.cut_off_data);
    //     var formattedCutOffData = cutOffData.toLocaleDateString('en-US', { day: '2-digit', month: 'long', year: 'numeric' });

    //     return formattedCutOffData + " - " + item.nama_rasio;
    // });
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: []
        },
        options: {
            scales: {
                y: {
                    min: 0,
                    max: 100
                }
            }
        }
    });

    function setChart(year){
        $.ajax({
        url: '{{ url("/dataChart") }}'+"/"+year,
        type: 'GET',
        success: (res) => {
            chart.data.datasets = res;
            chart.update();
        },
        error: (err) => {
            console.log(err);
        }
    });
    }

    setChart(2023)

    var ratios = data.map(function(item) {
        return item.rasio;
    });

    var cutOffData = data.map(function(item) {
        return item.cut_off_data;
    });

    $(document).ready(() => {
        $('#year').on('change',(event) => {
            setChart(event.target.value)
        });
    })

</script>


{{-- <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = @json($chart);

    var labels = data.map(function(item) {
        // Ubah format tanggal ke "tanggal-bulan-tahun"
        var cutOffData = new Date(item.cut_off_data);
        var formattedCutOffData = cutOffData.toLocaleDateString('en-US', { day: '2-digit', month: 'long', year: 'numeric' });

        return formattedCutOffData + " - " + item.nama_rasio;
    });

    var ratios = data.map(function(item) {
        return item.rasio;
    });

    var cutOffData = data.map(function(item) {
        return item.cut_off_data;
    });

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Rasio',
                data: ratios,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Menangani perubahan filter
    var filterElement = document.getElementById('namaRasioFilter');
    filterElement.addEventListener('change', function() {
        var selectedValue = filterElement.value;
        var filteredData = data.filter(function(item) {
            return selectedValue === '' || item.nama_rasio === selectedValue;
        });

        // Perbarui grafik dengan data yang difilter
        var filteredLabels = filteredData.map(function(item) {
            var cutOffData = new Date(item.cut_off_data);
            var formattedCutOffData = cutOffData.toLocaleDateString('en-US', { day: '2-digit', month: 'long', year: 'numeric' });
            return formattedCutOffData + " - " + item.nama_rasio;
        });

        var filteredRatios = filteredData.map(function(item) {
            return item.rasio;
        });

        chart.data.labels = filteredLabels;
        chart.data.datasets[0].data = filteredRatios;
        chart.update();
    });
</script> --}}






  @endpush
