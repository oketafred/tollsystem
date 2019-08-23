@extends('admin.master')

@section('title', 'View Rejected Users')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon"><i class="fa fa-user-circle"></i></div>
		<div class="header-title"> 
			<h1>Rejected</h1>
			<small>View Rejected Users</small>
			<ol class="breadcrumb hidden-xs">
				<li class="active">View Rejected Users</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<div class="content">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-bd">
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Full Name</th>
									<th>Email Address</th>
									<th>Mobile Number</th>
									<th>City</th>
									<th>Country</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@forelse($rejected_users as $rejected_user)
								<tr>
									<td>{{ $rejected_user->id }}</td>
									<td>{{ $rejected_user->full_name }}</td>
									<td>{{ $rejected_user->email }}</td>
									<td>{{ $rejected_user->phone_number }}</td>
									<td>{{ $rejected_user->city }}</td>
									<td>{{ $rejected_user->country }}</td>
									<td>
										@if(!$rejected_user->completed)
										<a href="activate/{{$rejected_user->email}}/{{$rejected_user->code}}" class="btn btn-success btn-sm">Accept</a>
										@else
										<a href="#" class="btn btn-danger btn-sm">Reject</a>
										@endif
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="7" class="text-center">
										<i class="fa fa-info-circle fa-5x"></i><br>
										<h4>No Rejected Users found</h4>
									</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- /.content -->
</div>
@endsection