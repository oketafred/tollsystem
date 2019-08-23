
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Toll System | Login Page</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">


    <!-- Bootstrap -->
    <link href="{{  asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Pe-icon-7-stroke -->
    <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href="{{ asset('assets/dist/css/stylehealth.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->

    <style>
        .container-center {
            margin-top: 50px;
        }
    </style>

</head>
<body>
    <!-- Content Wrapper -->
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h1 class="text-center">Toll Gate Payment System</h1>
                <hr>
            </div>
            <div class="panel-body text-center">
                <img src="assets/dist/img/TollSystem.png" alt="">
            </div>
            <div class="panel-body text-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Admin</a>
                <a href="{{ route('login') }}" class="btn btn-info btn-lg">User</a>
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
