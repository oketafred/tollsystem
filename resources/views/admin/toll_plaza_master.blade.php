@extends('admin.master')

@section('title', 'Toll Plaza Master')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon"><i class="fa fa-money"></i></div>
		<div class="header-title"> 
			<h1>Toll Plaza Master</h1>
			<small>Toll Plaza Master Prices</small>
			<ol class="breadcrumb hidden-xs">
				<li class="active">Toll Plaza Master</li>
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
							<a><i class="fa fa-backwardw"></i>Set Toll Plaza Master Prices </a>
							
							@if(!$toll_plaza_master_price->id)
							<button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal1">
								<i class="fa fa-money"></i> Set Toll Plaza Master Prices
							</button>

							@endif
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Location</th>
											<th>Lorry</th>
											<th>Car</th>
											<th>Bus</th>
											<th>Created At</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{{ $toll_plaza_master_price->id }}</td>
											<td>Kampala </td>
											<td>{{ number_format($toll_plaza_master_price->lorry) }}</td>
											<td>{{ number_format($toll_plaza_master_price->car) }}</td>
											<td>{{ number_format($toll_plaza_master_price->bus) }}</td>
											<td>{{ $toll_plaza_master_price->created_at }}</td>
											<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-money"></i> Update Prices
											</button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- /.content -->
</div>


<!--Set Price Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Toll Plaza Master Set Prices</h4>
			</div>
			<form action="{{ route('storePrices') }}" method="POST">

				{{ csrf_field() }}

				<div class="modal-body">
					<div class="form-group">
						<label for="lorry">Lorry</label>
						<input type="number" name="lorry" class="form-control">
					</div>
					<div class="form-group">
						<label for="car">Car</label>
						<input type="number" name="car" class="form-control">
					</div>
					<div class="form-group">
						<label for="bus">Bus</label>
						<input type="number" name="bus" class="form-control" >
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary pull-right">
						<i class="fa fa-money"></i> Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!--Update Price Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Toll Plaza Master</h4>
				</div>
				<form action="{{ route('updatePrices') }}" method="POST">

					{{ csrf_field() }}

					<input type="hidden" value="{{ $toll_plaza_master_price->id }}" name="id" class="form-control">

					<div class="modal-body">
						<div class="form-group">
							<label for="lorry">Lorry</label>
							<input type="number" value="{{ $toll_plaza_master_price->lorry }}" name="lorry" class="form-control">
						</div>
						<div class="form-group">
							<label for="car">Car</label>
							<input type="number" value="{{ $toll_plaza_master_price->car }}" name="car" class="form-control">
						</div>
						<div class="form-group">
							<label for="bus">Bus</label>
							<input type="number" value="{{ $toll_plaza_master_price->bus }}" name="bus" class="form-control" >
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary pull-right">
							<i class="fa fa-money"></i> Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		@endsection