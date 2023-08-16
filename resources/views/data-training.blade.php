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
            <h1 class="m-0"><b>Page</b>&nbsp;Data Training</h1>
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
	<div class="container mb-5">
		{{-- upload file --}}
		<div class="row g-3 align-items-center mt-2">
			<div class="col-auto">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Import Excel
			</button>
		</div>
		<div class="col-auto">
			<a href="/exportexcel" class="btn btn-success"><i class="fa-solid fa-file-excel"></i>Export Excel</a>
			<a href="/exportpdf" class="btn btn-secondary"><i class="fa-solid fa-file-pdf"></i>Export PDF</a>
			<a href="/deleteall" class="btn btn-warning"><i class="fa-regular fa-trash-can"></i>Delete All</a>
		</div>
		</div>

		<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				<form action="/importexcel" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<div class="form-group">
							<input type="file" name="file" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
				</form>
				</div>
			</div>

		<div class="row justify-content-center">
			<div class="card">
				<div class="col-auto mt-2">
				<a href="/tdstroke" class="btn btn-success">Tambah Data</a>
			</div>
				<div class="card-body justify">
			<table class="table table-striped" style="width:100%">
				<thead>
				  <tr>
					<th>id</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Hypertension</th>
					<th>Heart Disease</th>
					<th>Ever Married</th>
					<th>Average Glucose Level</th>
					<th>BMI</th>
					<th>Smoking Status</th>
					<th>Stroke</th>
					<th>Aksi</th>
				  </tr>
				</thead>
				<tbody>
				@php
					$no = 1;
				@endphp
				@foreach($data as $index => $row)
				<tr>
					<th scope="row">{{ $index + $data->firstItem() }}</th>
					<td>{{ $row->gender }}</td>
					<td>{{ $row->age }}</td>
					<td>{{ $row->hypertension }}</td>
					<td>{{ $row->heart_disease }}</td>
					<td>{{ $row->ever_married }}</td>
					<td>{{ $row->avg_gluose_level }}</td>
					<td>{{ $row->bmi }}</td>
					<td>{{ $row->smoking_status }}</td>
					<td>{{ $row->stroke }}</td>
					<td>
						<a href="/tampildata/{{ $row->id }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
						<a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"><i class="fa-solid fa-trash"></i></a>
					</td>
				  </tr>
				@endforeach
				</tbody>
			  </table>
			  {{$data->links()}}
		</div>
	</div>
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

{{-- sweet alert delete --}}
	<script>
	  $('.delete').click(function(){
		  var strokeid = $(this).attr('data-id');
		  swal({
			  title: "Apakah anda yakin?",
			  text: "Menghapus Data Stroke Dengan id "+strokeid+"",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			  })
			  .then((willDelete) => {
			  if (willDelete) {
				  window.location = "/delete/"+strokeid+""
				  swal("Data Berhasil Di Hapus", {
				  icon: "success",
				  });
			  } else {
				  swal("Data Tidak Terhapus");
			  }
		  });
	  });
  </script>
  {{-- notifikasi toast --}}
  <script>
	  @if (Session::has('success'))
	  toastr.success("{{Session::get('success')}}")
	  @endif
  </script>


@endpush
