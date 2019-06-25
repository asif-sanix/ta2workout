<head>
  <meta charset="utf-8">
  <title>{{config('app.name')}}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset(\App\Model\SiteSetting::latest()->value('logo'))}}" rel="icon">
  <link href="{{asset(\App\Model\SiteSetting::latest()->value('logo'))}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('web/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('web/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('web/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('web/css/developer.css')}}" rel="stylesheet">
</head>