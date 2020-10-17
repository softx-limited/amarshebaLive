@extends('backend.app')

@push('css')

@endpush

@section('content')


<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                         
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                <i class="fe-heart font-22 avatar-title text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="mt-1">Tk <span data-plugin="counterup">{{ $total_income }}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Income</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1">Tk <span data-plugin="counterup">{{ $totalExpense }}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Expense</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1">Tk <span data-plugin="counterup">{{ $net_profit }}</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Net Profit</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                                <i class="fe-eye font-22 avatar-title text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"> 0</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Pending Patient</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        <div class="row">
                           

                            <div class="col-lg-12">
                                <div class="card-box pb-2">
                                    <div class="float-right d-none d-md-inline-block">
                                        <div class="btn-group mb-2">
                                           
                                        </div>
                                    </div>

                                    <h4 class="header-title mb-3">Income Graph View</h4>

                                    <div dir="ltr" height="400px">
                                        <canvas id="myChart" height="50"></canvas>


                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                        </div>



                        <div class="row">
                           

                            <div class="col-lg-12">
                                <div class="card-box pb-2">
                                    <div class="float-right d-none d-md-inline-block">
                                        <div class="btn-group mb-2">
                                           
                                        </div>
                                    </div>

                                    <h4 class="header-title mb-3">Expense Graph View</h4>

                                    <div dir="ltr" height="400px">
                                        <canvas id="myChart2" height="50"></canvas>


                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                         
                        <!-- end row -->
                        
                    </div> <!-- container -->
</div> 


@endsection


@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
var datas=<?php echo json_encode($chartValues) ?>;
expenses=<?php echo json_encode($chartExpenses) ?>;
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['','jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',],
        datasets: [{
            label: 'income',
            backgroundColor:'green' ,
            data: datas
        }]
    },

    // Configuration options go here
    options: {}
});




var ctx2 = document.getElementById('myChart2').getContext('2d');
var chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['','jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',],
        datasets: [{
            label: 'expense',
            backgroundColor:'red' ,
            data: expenses
        }]
    },

    // Configuration options go here
    options: {}
});



</script>




@endpush
