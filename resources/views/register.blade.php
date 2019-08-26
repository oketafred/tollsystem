<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Toll System | Register Page</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">
    
    <!-- Bootstrap -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Pe-icon-7-stroke -->
    <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href="{{ asset('assets/dist/css/stylehealth.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
    <style>
        .container-center.lg {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Content Wrapper -->
    <div class="login-wrapper">
        <div class="container-center lg">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Register</h3>
                            <small><strong>Please enter your data to register.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('register') }}" id="loginForm" method="POST">

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="full_name">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>RFID</label>
                                <input type="text" class="form-control" name="rfid">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>City</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Country</label>
                                <input type="text" class="form-control" name="country">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Vehicle Type</label>
                                <select class="form-control" name="vehicle_type">
                                    <option value="">Select Vehicle Type</option>
                                    <option value="lorry">Lorry</option>
                                    <option value="car">Car</option>
                                    <option value="bus">Bus</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning">Register</button>
                            <a class="btn btn-primary" href="/">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>

</html>