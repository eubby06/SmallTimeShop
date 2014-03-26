<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('assets/vendor/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/app.css') }}

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <div class="navbar navbar-default">
          <div class="container-fluid">
              <a href="#" class="logo"><img src="../assets/images/logo.png"></img></a>
          </div>
      </div>

      <div class="content container-fluid">
          <div class="row">
            
              @include('backend.layouts.sidebar')
              
              <div class="main col-md-10">  
                <div class="breadcrumbs">
                  <span class="glyphicon glyphicon-transfer"></span> <a href="#">Home</a> / <a class="active">Dashboard</a>
                </div>
                <div class="display"> @yield('content') </div>
              </div>
          </div>
      </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('assets/vendor/js/jquery.min.js') }}
    {{ HTML::script('assets/vendor/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/imageUploader.js') }}
  </body>
</html>
