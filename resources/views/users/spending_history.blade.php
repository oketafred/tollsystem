@extends('users.master')

@section('title', 'Spending History')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon"><i class="fa fa-money"></i></div>
		<div class="header-title"> 
			<h1>Toll Plaza Spendings</h1>
			<small>Toll Plaza Spendings</small>
			<ol class="breadcrumb hidden-xs">
				<li class="active">Topup</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<div class="content">

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
										<th>Amount WithDrawn</th>
                                        <th>Toll Plaza</th>
                                        <th>Charged At</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td></td>
										<td></td>
                                        <td></td>
                                        <td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div> <!-- /.content -->
</div>

@endsection