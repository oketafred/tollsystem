@extends('admin.master')

@section('title', 'Admin Dashboard Page')

@section('content')
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">  
                <div class="header-icon">
                    <i class="fa fa-tachometer"></i>
                </div>
                <div class="header-title">
                    <h1> Dashboard</h1>
                    <small> Admin Dashboard</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="panel panel-bd cardbox">
                            <div class="panel-body">
                                <div class="statistic-box">
                                    <h2><span class="count-number">{{ $registered_users_count }}</span>
                                    </h2>
                                </div>
                                <div class="items pull-left">
                                    <i class="fa fa-users fa-2x"></i>
                                    <h4>Registered Users </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="panel panel-bd cardbox">
                            <div class="panel-body">
                                <div class="statistic-box">
                                    <h2><span class="count-number">{{ $rejected_users_count }}</span>
                                    </h2>
                                </div>
                                <div class="items pull-left">
                                    <i class="fa fa-users fa-2x"></i>
                                    <h4>Rejected Users</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="panel panel-bd cardbox">
                            <div class="panel-body">
                                <div class="statistic-box">
                                    <h2><span class="count-number">{{ $topup_count }}</span>
                                    </h2>
                                </div>
                                <div class="items pull-left">
                                    <i class="fa fa-money fa-2x"></i>
                                    <h4>Top Ups</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Bar Chart -->
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>No of Active Users Vs No of InActive Users</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <canvas id="barChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Radar Chart -->
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-bd">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>No of Topup Vs No of Active Users </h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <canvas id="radarChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                </div> <!-- /.row -->
            </section> <!-- /.content -->

        </div> <!-- /.content-wrapper -->
        @endsection


        @section('scripts')
        <script>
        //Pie Chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($first_chart['groups']) !!},
                datasets: [{
                    label: '# of Votes',
                    data: {!! json_encode($first_chart['data']) !!},
                    backgroundColor: [
                    '#ffc107',
                    '#3f9788'
                    ],
                    borderColor: [
                    '#ffc107',
                    '#3f9788'
                    ],
                    borderWidth: 1
                }]
            },
            options: {}
        });
      //radar chart
      // var ctx = document.getElementById("radarChart");
      var ctx = document.getElementById('radarChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($second_chart['groups']) !!},
            datasets: [{
                label: '# of Votes',
                data: {!! json_encode($second_chart['data']) !!},
                backgroundColor: [
                '#007bff',
                '#dc3545'
                ],
                borderColor: [
                '#007bff',
                '#dc3545'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });
</script>
@endsection