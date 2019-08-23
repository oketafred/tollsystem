@extends('admin.master')

@section('title', 'Admin Smart Card Top Up')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon"><i class="fa fa-user-circle"></i></div>
		<div class="header-title"> 
			<h1>Top Up</h1>
			<small>Search Users for Topup</small>
			<ol class="breadcrumb hidden-xs">
				<li class="active">Topup</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<div class="content">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-bd">
					<div class="panel-body">
						<form action="{{ route('topup') }}" method="POST">
							
							{{ csrf_field() }}

							<div class="col-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Enter RFID</span>
									<input type="text" name="searchTerm" class="form-control" required style="height: 50px;">
								</div>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-success btn-lg">Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		@if($search_results)
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-bd">
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>RFID Number</th>
										<th>Username</th>
										<th>Email Address</th>
										<th>Phone Number</th>
										<th>City</th>
										<th>Country</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse($search_results as $search_result)
									<tr>
										<td>{{ $search_result->id }}</td>
										<td>{{ $search_result->rfid }}</td>
										<td>{{ $search_result->username }}</td>
										<td>{{ $search_result->email }}</td>
										<td>{{ $search_result->phone_number }}</td>
										<td>{{ $search_result->city }}</td>
										<td>{{ $search_result->country }}</td>
										<td><a href="{{ route('user.detail', $search_result->rfid)}}" class="btn btn-danger btn-sm" >View Detail</a></td>
									</tr>
									@empty
									<tr>
										<td colspan="8" class="text-center">
											<i class="fa fa-info-circle fa-5x"></i><br>
											No Search Result found
										</td>
									</tr>
									@endforelse
								</tbody>
							</table>
							{{ $search_results->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif

	</div> <!-- /.content -->
</div>

@endsection