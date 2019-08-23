@extends('admin.master')

@section('title', 'View Registration')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon"><i class="fa fa-user-circle"></i></div>
		<div class="header-title"> 
			<h1>Registration</h1>
			<small>View Registration</small>
			<ol class="breadcrumb hidden-xs">
				<li class="active">View Registration</li>
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
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->full_name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->phone_number }}</td>
									<td>{{ $user->city }}</td>
									<td>{{ $user->country }}</td>
									<td>
										@if(!$user->completed)
										<a href="activate/{{$user->email}}/{{$user->code}}" class="btn btn-success btn-sm">Accept</a>
										@else
										<a href="unactivate/{{$user->email}}/{{$user->code}}" class="btn btn-danger btn-sm">Reject</a>
										@endif
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="7" class="text-center">
										<i class="fa fa-info-circle fa-5x"></i><br>
										<h4>No User Registration found</h4>
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