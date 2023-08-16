@extends('layout.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0"><b>Dashboard</b> Prediksi Penderita Penyakit Stroke</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h2 class="card-title fw-bold">Data Training</h2>
                  <a href="/stroke">Lihat Data</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">
                      {{ $jumlahdata }}
                    <small>Data Training</small>
                    </span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->

          {{-- Tampil Data Male --}}
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h2 class="card-title fw-bold">Penderita Stroke</h2>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">
                      {{ $jumlahstroke }}
                    <small>Data</small>
                    </span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
            <!-- /.card -->
          </div>

          {{-- Tampil Data Female --}}
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h2 class="card-title fw-bold">Tidak Penderita Stroke</h2>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">
                      {{ $jumlahtstroke }}
                    <small>Data</small>
                    </span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="panel">
                <div id="piechart"></div>
              </div>
            </div>
          </div>
            <!-- /.card -->

        <div class="col-lg-6">
              <div class="card">
                <div class="panel">
                  <div id="donutchart"></div>
                </div>
              </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="panel">
              <div id="halfpiechart"></div>
            </div>
          </div>
    </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="panel">
              <div id="chart_div"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="panel">
              <div id="chart_ver"></div>
            </div>
          </div>
        </div>


        <div class="col-lg-6">
          <div class="card">
            <div class="panel">
              <div id="curve_chart"></div>
            </div>
          </div>
        </div>

          <div id="emailHelp" class="form-text">Klik link berikut untuk mengetahui langkah-langkah dalam menggunakan Website ini
          <a href="/panduan" class="brand-text"><b>Pedoman</b></a>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

{{-- PIE CHART --}}
@section('footer')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Count'],
      ['Stroke', {{$jumlahstroke}}],
      ['Tidak Stroke', {{$jumlahtstroke}}],
    ]);

    var options = {
      title: 'Grafik Full Pie Persentase Stroke dan Tidak Stroke',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>

@endsection

{{-- DONUT CHART --}}
@section('footer1')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Count'],
          ['Stroke', {{ $jumlahstroke }}],
          ['Tidak Stroke', {{ $jumlahtstroke }}]
        ]);

        var options = {
          title: 'Grafik Donut Persentase Stroke dan Tidak Stroke',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
@endsection

{{-- SETENGAH LINGKARAN PIE CHART --}}
@section('stlingkaran')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var total = {{$jumlahstroke}} + {{$jumlahtstroke}};
    var strokePercentage = ({{$jumlahstroke}} / total) * 100;
    var tidakStrokePercentage = ({{$jumlahtstroke}} / total) * 100;

    var data = google.visualization.arrayToDataTable([
      ['Pac Man', 'Percentage'],
      ['Stroke', strokePercentage],
      ['Tidak Stroke', tidakStrokePercentage],
    ]);

    var options = {
      title: 'Grafik Setengah Lingkaran Persentase Stroke dan Tidak Stroke',
      pieStartAngle: 135,
      slices: {
        0: { color: 'yellow' },
        1: { color: 'transparent' }
      },
      pieSliceText: 'label', // Menampilkan label persentase pada irisan
      pieSliceTextStyle: {
        color: 'black',
        fontSize: 14,
      },
      tooltip: {
        text: 'percentage' // Menampilkan persentase pada tooltip
      },
      legend: {
        position: 'labeled', // Menampilkan label keterangan
        textStyle: {
          fontSize: 12,
        }
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('halfpiechart'));
    chart.draw(data, options);
  }
</script>
@endsection



{{-- BAR CHART --}}
@section('footer2')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
      var data = google.visualization.arrayToDataTable([
      ['Task', 'Data'],
      ['Stroke', {{ $jumlahstroke }}],
      ['Tidak Stroke', {{ $jumlahtstroke }}]
      ]);

      var options = {
        title: 'Grafik Bar Data Stroke dan Tidak Stroke',
        chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'Total Penderita Penyakit Stroke',
          minValue: 0,
        },
        vAxis: {
          title: 'Kriteria'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>
@endsection

{{-- VERTICAL HISTOGRAM --}}
@section('footer4')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawAnnotations);

  function drawAnnotations() {
    var total = {{$jumlahstroke}} + {{$jumlahtstroke}};
    var strokePercentage = ({{$jumlahstroke}} / total) * 100;
    var tidakStrokePercentage = ({{$jumlahtstroke}} / total) * 100;

    var data = google.visualization.arrayToDataTable([
      ['Element', 'Persentase', { role: 'style' }],
      ['Stroke', strokePercentage, '#b87333'],
      ['Tidak Stroke', tidakStrokePercentage, 'color: #e5e4e2'],
    ]);

    var options = {
      title: 'Grafik Vertikal Persentase Stroke dan Tidak Stroke',
      annotations: {
        alwaysOutside: true,
        textStyle: {
          fontSize: 14,
          color: '#000',
          auraColor: 'none'
        }
      },
      hAxis: {
        title: 'Kriteria',
      },
      vAxis: {
        title: 'Persentase'
      }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_ver'));
    chart.draw(data, options);
  }
</script>
@endsection


{{-- LINE CHART --}}
@section('footer3')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Data'],
          ['Stroke', {{ $jumlahstroke }}],
          ['Tidak Stroke', {{ $jumlahtstroke }}]
        ]);

        var options = {
          title: 'Grafik Line Data Stroke dan Tidak Stroke',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
@endsection



