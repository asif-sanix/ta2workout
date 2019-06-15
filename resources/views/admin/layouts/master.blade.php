 <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Admin | @yield('title','ERP')</title>
  <link href="{{App\Model\SiteSetting::latest()->value('favicon')}}" rel="icon">
  <link href="{{App\Model\SiteSetting::latest()->value('favicon')}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/app.css')}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/extensions/toastr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/plugins/extensions/toastr.css')}}">
  @stack('links')
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->

 @include('admin.layouts.header')
 @include('admin.layouts.aside')
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    @section('main')
                      @show
                </div>
            </div>
      </div>
    </div>
  </div>
@include('admin.layouts.footer')


   <script src="{{asset('admin-assets/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/scripts/tables/datatables/datatable-advanced.js')}}" type="text/javascript"></script>
   <script src="{{asset('admin-assets/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/scripts/extensions/toastr.js')}}" type="text/javascript"></script>

  @if (Session::has('message'))
    <script type="text/javascript">
        Command: toastr["{{Session::get('class')}}"](" {{Session::get('message')}}")
    </script>
  @endif

  @stack('scripts')
</body>
</html>
 