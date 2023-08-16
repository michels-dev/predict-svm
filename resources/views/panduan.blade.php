@extends ('layout.admin')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
		  <div class="row mb-2">
			<div class="col-sm-6">
			  <h1 class="m-0"><b>Page</b>&nbsp;Pedoman</h1>
			</div>
		  </div><!-- /.row -->
		</div><!-- /.container-fluid -->
	  </div>

<div class="content">
	<div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12">
		  <div class="card">
			<div class="card-header border-0">
				<h2 class="card-title">Untuk melakukan prediksi Administrator, silahkan ikuti langkah-langkah berikut:</h2>
			</div>
			<div class="card-body">
			  <div class="d-flex">
				<img src="{{asset('template/dist/imgadmin.png')}}" alt="User Avatar" class="w-100 img-fluid ">
			</div>
				<img src="{{asset('template/dist/imgcode.png')}}" alt="User Avatar" class="w-100 img-fluid ">
			</div>
		  </div>
		  <div class="card">
			<div class="card-header border-0">
				<h2 class="card-title">Untuk melakukan prediksi User, silahkan ikuti langkah-langkah berikut:</h2>
			</div>
			<div class="card-body">
			  <div class="d-flex">
				<img src="{{asset('template/dist/imguser.png')}}" alt="User Avatar" class="w-100 img-fluid ">
			</div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
</div>
</div>

@endsection
