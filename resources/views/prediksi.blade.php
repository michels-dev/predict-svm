@extends ('layout.admin')

@section('content')
<body>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
			<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><b>Page</b>&nbsp;Prediksi Penderita Penyakit Stroke</h1>
				</div>
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
			</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
		  <div class="container-fluid">
			<div class="row">
			  <div class="col-lg-6">
				<div class="card">
				  <div class="card-header border-0">
					<div id="emailHelp" class="form-text">Silahkan Mengisi Formulir Anda Dengan Benar Pada
						<a href="/predict-form" class="brand-text"><b>Form Prediksi</b></a>
				  </div>
				  <div class="card-body">
					<div class="d-flex">
					  <form action="{{ route('predict.submit') }}" method="POST">
						@csrf
						<div class="mb-2 col-xs-6">
							<select class="form-select" aria-label="Default select example" name="gender" id="gender">
								<option selected>Pilih Jenis Kelamin</option>
								<option value="0">Laki-Laki</option>
								<option value="1">Perempuan</option>
							  </select>
						</div>
					  <div class="mb-2 col-xs-6">
						<input type="text" class="form-control" id="age" name="age" aria-describedby="emailHelp" placeholder="Masukkan Umur Anda">
						</div>
						<div class="mb-2 col-xs-6">
							<select class="form-select" aria-label="Default select example" name="hypertension" id="hypertension">
								<option selected>Pilih Hipertensi Anda</option>
								<option value="0">Tidak Hipertensi</option>
								<option value="1">Hipertensi</option>
							  </select>
						</div>
						<div class="mb-2 col-xs-12">
							<select class="form-select" aria-label="Default select example" name="heart_disease" id="heart_disease">
								<option selected>Pilih Penderita Jantung Anda</option>
								<option value="0">Tidak Penderita Penyakit Jantung</option>
								<option value="1">Penderita Penyakit Jantung</option>
							  </select>
						</div>
						<div class="mb-2 col-xs-16">
							<select class="form-select" aria-label="Default select example" name="ever_married" id="ever_married">
								<option selected>Pilih Status Menikah</option>
								<option value="0">Belum Menikah</option>
								<option value="1">Sudah Menikah</option>
							  </select>
					  </div>
						<div class="mb-2 col-xs-6">
						<input type="text" class="form-control" id="avg_gluose_level" name="avg_gluose_level" aria-describedby="emailHelp" placeholder="Masukkan Kadar Glukosa Anda">
						</div>
						<div class="mb-2 col-xs-6">
						<input type="text" class="form-control" id="bmi" name="bmi" aria-describedby="emailHelp" placeholder="Masukkan Indeks Masa Tubuh Anda">
						</div>
						<div class="mb-2 col-xs-6">
							<select class="form-select" aria-label="Default select example" name="smoking_status" id="smoking_status">
								<option selected>Pilih Status Merokok</option>
								<option value="0">Tidak Pernah Merokok</option>
								<option value="1">Sebelumnya Merokok</option>
								<option value="2">Merokok</option>
							  </select>
						</div>
					  <button type="submit" class="btn btn-primary">Prediksi</button>
					  </form>
					</div>
				  </div>
				</div>
				<!-- /.card -->
			  </div>
			</div>
			  <!-- /.col-md-6 -->
			  <div class="col-lg-6">
				<div class="card">
				  <div class="card-header border-0">
					<div class="d-flex ">
					</div>
				  </div>
				  <div class="card-body">
					<div class="d-flex">
					  <div class="h4 pb-2 mb-4 text-primary border-bottom border-primary">
						Hasil Prediksi : &nbsp;
					</div>
					@if (isset($result))
						@if($result == 0)
							<h4><b>Tidak Penderita Stroke</b></h4>
						@else
							<h4><b>Penderita Stroke</b></h4>
						@endif
					@endif
					</div>
					</div>
				</div>
				<!-- /.card -->
				</div>
				</div>
			  </div>
			  <!-- /.col-md-6 -->
			</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
@endsection
