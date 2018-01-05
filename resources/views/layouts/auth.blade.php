<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <title>{{ (isset($title))?$title:'404 Not Found' }} - EduShastra GMCAT </title>
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href='{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}' rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <!-- Custom fonts for this template-->
  <link href='{{ asset("assets/vendor/font-awesome/css/font-awesome.min.css") }}' rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href='{{ asset("assets/css/sb-admin.css") }}' rel="stylesheet">
</head>

<body class="bg-dark">

  <div class="container">
    <div class="mx-auto mt-5">
      <center> <a href="/"> <img src='{{ asset("/assets/img/logo-white.png") }}' alt="EduShastra GMCAT" class="navbar-brand"> </a> </center>
    </div>
    @yield('content')
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src='{{ asset("/assets/vendor/jquery/jquery.min.js") }}'></script>
  <script src='{{ asset("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}'></script>
  <!-- Core plugin JavaScript-->
  <script src='{{ asset("/assets/vendor/jquery-easing/jquery.easing.min.js") }}'></script>
</body>
</html>
