<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Bootstrap Real Estate Website Template">
        <meta name="author" content="KimaroTec">

        <title>Global Money Group| @yield('title')</title>

        <!-- Bootstrap core CSS -->
        <link href="css/normalize.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- Ico font CSS -->
        <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="fonts/icofont/css/icofont.css" rel="stylesheet">
        <link href="fonts/themify-icons/themify-icons.css" rel="stylesheet">
        <link href="fonts/flag-icon/flag-icon.css" rel="stylesheet">
        <link href="fonts/flag-icon/docs.css" rel="stylesheet">

        <!-- Style CSS -->
        <link href="css/style.css" rel="stylesheet">

        @yield('styles')


        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
        <![endif]-->
        <!-- Favicons -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    </head>
    <body>

      @include('components.feedback')
      <!--@include('components.preloader')-->
      @include('components.top_bar')

      @include('components.menu')

      

      @yield('content')

      @include('components.footer')


      <!-- Bootstrap core and JavaScript's
      ================================================== -->
      <script src="js/jquery-1.10.2.min.js"></script>
      <script src="js/jquery-migrate-1.2.1.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.parallax.js"></script>
      <script src="js/jquery.fitvids.js"></script>
      <script src="js/jquery.unveilEffects.js"></script>
      <script src="js/bootstrap-select.js"></script>
      <script src="js/jquery.fancybox.pack.js"></script>
      <script src="js/nicescroll.js"></script>
      <script src="js/main.js"></script>

      <!-- Googgle map
      ================================================== -->

      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <script src="js/infobox.js"></script><!-- Parallax -->
      <script src="js/data.json"></script>
      <script src="js/markerclusterer.js"></script>
      <script src="js/markers-map.js"></script>

 <!-- flag-icon
      ================================================== -->
      <script src="js/docs.js"></script>

 <!-- mrova-feedback-form      
      ================================================== -->
      <script src="js/mrova-feedback-form.js" type="text/javascript"></script>  

      @yield('scripts')

  </body>
</html>
