 <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">
 <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
 <!-- Stylesheets -->
 <link rel="stylesheet" href="{{asset('global/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min.css')}}">
 <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">
 <!-- Plugins -->
 <link rel="stylesheet" href="{{asset('global/vendor/animsition/animsition.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/asscrollable/asScrollable.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/switchery/switchery.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/intro-js/introjs.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/slidepanel/slidePanel.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/flag-icon-css/flag-icon.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/waves/waves.css')}}">
 <link rel="stylesheet" href="{{asset('assets/examples/css/charts/chartjs.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/select2/select2.css')}}">
 <link rel="stylesheet" href="{{asset('assets/examples/css/charts/flot.css')}}">
 <link rel="stylesheet" href="{{asset('global/vendor/toastr/toastr.css')}}">
 <link rel="stylesheet" href="{{asset('assets/css/pace.css')}}">
 @if(active('cost/benchmarking'))
 <link rel="stylesheet" href="{{ asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
 @endif
 <!-- Fonts -->
 <style type="text/css">
  .site-menu-item a {
    color: rgb(255, 255, 255) !important;
  }
  .site-menu-item a:hover {
    color: rgb(255, 255, 255) !important;
  }
  .site-menu-sub{
    background-image: url('{{asset('assets/images/bg-color.jpg')}}') !important;
  }
  .dropdown-item{
    text-decoration: none;

  }

  .select2, .select2-container, .select2-container--default, .select2-container--above, .select2-container--focus, .select2-container--open{

    z-index: 999999 !important;
  }
  .select2-selection, .select2-selection--multiple{

    height: 50px;
  }

</style>
<script src="{{asset('global/vendor/jquery/jquery.js')}}"></script> 
<link rel="stylesheet" href="{{asset('global/vendor/bootstrap-select/bootstrap-select.css')}}">
<link rel="stylesheet" href="{{asset('assets/skins/green.min.css')}}">
<link rel="stylesheet" href="{{asset('global/fonts/material-design/material-design.min.css')}}">
<link rel="stylesheet" href="{{asset('global/fonts/brand-icons/brand-icons.min.css')}}">
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
    <script src="{{asset('global/vendor/html5shiv/html5shiv.min.js')}}"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="{{asset('global/vendor/media-match/media.match.min.js')}}"></script>
    <script src="{{asset('global/vendor/respond/respond.min.js')}}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{asset('global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
      Breakpoints();
    </script>