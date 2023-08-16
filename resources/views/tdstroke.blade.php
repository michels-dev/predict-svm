@extends('layout.admin')

@push('css')
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 {{-- Fontawesome --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
 {{-- toastr --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet">
@endpush

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Page</b>&nbsp;Tamba Data Stroke</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard SVM Predict</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	<div class="card mt-2">
		<div class="card-header">
			Silahkan Input Data Anda Dengan Benar
		</div>
		<div class="card-body justify-">
			<form action="/insertstroke" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="mb-3">
					<select class="form-select" name="gender" arial-label="Default select example">
						<option selected>Pilih Jenis Kelamin</option>
						<option value="0">Laki-Laki</option>
						<option value="1">Perempuan</option>
				</div>
				<div class="mb-3">
					<input type="text" name="age" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Umur Anda">
				</div>
				<div class="mb-3">
					<select class="form-select" name="hypertension" arial-label="Default select example">
						<option selected>Pilih Hipertensi</option>
						<option value="0">Tidak Hipertensi</option>
						<option value="1">Hipertensi</option>
				</div>
				<div class="mb-3">
					<input type="text" name="heart_disease" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Penderita Jantung">
					<div id="emailHelp" class="form-text">Silahkan Mengisi 0 Jika Tidak Penderita Jantung<br>
						Silahkan Mengisi 1 Jika Penderita Jantung
				  </div>
				</div>
				<div class="mb-3">
					<select class="form-select" name="ever_married" arial-label="Default select example">
						<option selected>Pilih Status Menikah</option>
						<option value="0">Belum Menikah</option>
						<option value="1">Sudah Menikah</option>
				</div>
				<div class="mb-3">
					<input type="text" name="avg_gluose_level" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Kadar Glukosa">
				</div>
				<div class="mb-3">
					<input type="text" name="bmi" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Indeks Masa Tubuh">
				</div>
				<div class="mb-3">
					<select class="form-select" name="smoking_status" arial-label="Default select example">
						<option selected>Pilih Status Merokok</option>
						<option value="0">Belum Pernah Merokok</option>
						<option value="1">Sebelumnya Merokok</option>
						<option value="2">Merokok</option>
				</div>
				<div class="mb-3">
					<input type="text" name="stroke" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Penderita Penyakit Stroke">
					<div id="emailHelp" class="form-text">Silahkan Mengisi 0 Jika Tidak Penderita Stroke<br>
						Silahkan Mengisi 1 Jika Penderita Stroke
				  </div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			  </form>
		</div>
	  </div>
  </div>
    <!-- /.content-header -->
@endsection

@push('scripts')
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  {{-- script sweet alert --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  {{-- end --}}
  {{-- script toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  {{-- end --}}
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>


@endpush
