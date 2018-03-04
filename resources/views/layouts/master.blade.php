<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Laravel Shop</title>

        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <link href="{{asset('public/fa/css/font-awesome.css')}}" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

        <!-- Material Design Bootstrap -->
        <link href="{{asset('public/css/mdb.css')}}" rel="stylesheet">

        <!-- Custom Styles -->
        <link href="{{asset('public/css/style.css')}}" rel="stylesheet">


    </head>


    <body>


        @include('partials.header')

        <main>

            <!--Main layout-->
            <div class="container margintop50">
                <div class="row">

                    <!--Sidebar Left-->
                    @yield('sidebarLeft')
                    <!--/.Sidebar-->

                    <!--Main column-->
                    @yield('mainContent')
                    <!--Main column end-->

                    <!--Sidebar Right-->
                    @yield('sidebarRight')
                    <!--/.Sidebar-->

                </div>
            </div>
            <!--/.Main layout-->

        </main>

        <!--Footer-->
        @include('partials.footer')
        <!--/.Footer-->


        <!-- SCRIPTS -->



        <!-- JQuery -->
        <script type="text/javascript" src="{{asset('public/js/jquery-3.1.1.js')}}"></script>

        <!-- Bootstrap dropdown -->
        <script type="text/javascript" src="{{asset('public/js/popper.min.js')}}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{asset('public/js/bootstrap.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{asset('public/js/mdb.js')}}"></script>

        <script type="text/javascript">
            new WOW().init();
        </script>

        @yield('shopNotification')

    </body>

</html>