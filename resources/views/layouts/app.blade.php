<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>
        <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/base/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
        <style>
            #pakati {
                width: 50%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="container-scroller">
            @include('layouts.navigation')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper">
                        {{$slot}}
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="footer-wrap">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://faraimunashe.me" target="_blank">faraimunashe.me </a>2022</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://faraimunashe.me" target="_blank"> Prof-Virus </a> Inc</span>
                            </div>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <script src="{{asset('assets/vendors/base/vendor.bundle.base.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
        <script src="{{asset('assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js')}}"></script>
        <script src="{{asset('assets/vendors/justgage/raphael-2.1.4.min.js')}}"></script>
        <script src="{{asset('assets/vendors/justgage/justgage.js')}}"></script>
        <script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/dashboard.js')}}"></script>
    </body>
</html>
