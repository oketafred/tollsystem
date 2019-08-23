@extends('users.master')

@section('title', 'My Top Up History')

@section('style')
    <style>
        .css-serial {
            counter-reset: serial-number;  /* Set the serial number counter to 0 */
            }

            .css-serial td:first-child:before {
            counter-increment: serial-number;  /* Increment the serial number counter */
            content: counter(serial-number);  /* Display the counter */
            }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon"><i class="fa fa-money"></i></div>
            <div class="header-title">  
                <h1>Top Up History</h1>
                <small>Top Up History</small>
                <ol class="breadcrumb hidden-xs">
                    <li class="active">My Top Up History</li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="panel panel-bd text-center">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3><i class="fa fa-money"></i> Balance</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3 style="margin: 0px;">UGX {{ number_format($user_top_historys->sum('amount')) }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-md-8">
                        <div class="panel panel-bd">
                        <table class="table table-hover table-sm css-serial">
                                <div class="panel-heading">
                                        <div class="panel-title text-center">
                                            <h3><i class="fa fa-money"></i> Top Up History</h3>
                                        </div>
                                    </div>
                                <tbody>
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>RFID Number</th>
                                            <th>Amount Deposited</th>
                                            <th>Deposited At</th>
                                        </tr>
                                        @forelse ($user_top_historys as $user_top_history)
                                        <tr>
                                                <td></td>
                                                <td>{{ $user->rfid }}</td>
                                                <td>{{ number_format($user_top_history->amount) }}</td>
                                                <td>{{ $user_top_history->created_at->diffForHumans() }}</td>
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
        </div> <!-- /.content -->
    </div>
@endsection
