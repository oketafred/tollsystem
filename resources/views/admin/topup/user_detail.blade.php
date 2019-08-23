@extends('admin.master')

@section('title', 'Top Up User Detail')

@section('content')

<style>
	.img-circle {
		margin: auto;
	}
</style>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon"><i class="fa fa-user-circle"></i></div>
		<div class="header-title"> 
			<h1>Top Up User Detail</h1>
			<small>User Detail</small>
			<ol class="breadcrumb hidden-xs">
				<li class="active">User Detail</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<div class="content">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-bd">
					<div class="panel-heading">
						<div class="panel-title">
							<a href="{{ route('topup') }}" class="btn btn-success text-white"><i class="fa fa-backward"></i> Top Smart Card List</a>

							<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">
								<i class="fa fa-money"></i> Top Up Now
							</button>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-3 text-center">
								<img src="/uploads/user_image/avatar.png"
								class="img-responsive img-circle">
							</div>
							<div class="col-lg-9" style="font-size: 15px;">
								<table class="table table-hover table-sm">
									<tbody>
										<thead class="bg-success">
											<tr>
												<th class="text-center" colspan="4">
													<h4>User Detail</h4>
												</th>
											</tr>
										</thead>
										<tr>
											<th>Full Name</th>
											<td>{{ $user->full_name }}</td>
											<th>Phone</th>
											<td>{{ $user->phone_number }}</td>
										</tr>
										<tr>
											<th>Email</th>
											<td>{{ $user->email }}</td>
											<th>RFID Number</th>
											<td>{{ $user->rfid }}</td>
										</tr>
										<tr>
											<th>City</th>
											<td>{{ $user->city }}</td>
											<th>Country</th>
											<td>{{ $user->country }}</td>
										</tr>
										<tr>
											<th>Vehicle Number</th>
											<td>{{ $user->vehicle_type }}</td>
											<th>Created At</th>
											<td>{{ $user->created_at }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-bd">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12" style="font-size: 15px;">
								<table class="table table-hover table-sm">
									<tbody>
										<thead class="bg-success">
											<tr>
												<th class="text-center" colspan="5">
													<h4>Top Up History</h4>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>#</th>
												<th>Full Name</th>
												<th>RFID Number</th>
												<th>Amount Deposited</th>
												<th>Deposited At</th>
											</tr>
											@forelse($user->topups as $topup)
											<tr>
												<td>{{ $topup->id }}</td>
												<td>{{ $topup->user->full_name }}</td>
												<td>{{ $topup->user->rfid }}</td>
												<td>{{ number_format($topup->amount) }}</td>
												<td>{{ $topup->created_at }}</td>
											</tr>
											@empty
											<tr>
												<td colspan="5" class="text-center">
													<i class="fa fa-info-circle fa-5x"></i><br>
													No Top Up History found
												</td>
											</tr>
											@endforelse
										</tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div> <!-- /.content -->
</div>


<!--Top Up Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Top Up Form</h4>
			</div>
			<form action="{{ route('topup_amount') }}" method="POST">

				{{ csrf_field() }}

				<input type="hidden" name="user_id" value="{{ $user->id }}">

				<div class="modal-body">
					<div class="form-group">
						<input type="number" name="topup_amount" class="form-control" placeholder="Enter Top Up Amount">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary pull-right">
						<i class="fa fa-money"></i> Top Up Now</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endsection