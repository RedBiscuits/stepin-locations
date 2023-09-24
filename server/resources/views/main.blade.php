<!DOCTYPE html>
<html class="loading" >


  @include('head')

  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-chartbg" data-col="2-columns">



    @yield('content')

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"> {{ date("Y")}}  &copy; Copyright
         <a class="text-bold-800 grey darken-2" href=" " target="_blank"> </a></span>

      </div>
    </footer>


    <script src="{{ asset('main/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('main/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('main/js/scripts/forms/switch.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('main/js/core/app-menu.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('main/js/core/app.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('main/vendors/js/jquery.sharrre.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    @stack('js')

  </body>


</html>
