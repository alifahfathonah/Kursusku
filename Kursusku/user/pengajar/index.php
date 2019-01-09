<html>
<head>
  <title>Kursus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/bootstrap-datepicker.js"></script>
  <link href="../../font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-datepicker.css" rel="stylesheet">
	<link rel="icon" href="../../img/favico.ico" type="image/ico">
  <style type="text/css">
  @font-face{
    font-family: 'Monte Cristok';
    src : url('../../font/Honeyguide.otf');
  }
  @font-face{
    font-family: 'Merriweather';
    src : url('../../font/Merriweather.ttf');
  }
    h1, p {
      font-family: 'Monte Cristok' !important;
    }

   h3,th,td,footer,a,li  {
      font-family: 'Merriweather' !important;
    }

  </style>

</head>
<body style="overflow-x: hidden;">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../../index.php">KURSUS</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="page-header text-center" style="margin-top: 70px">
    <h1>LOGIN PENGAJAR</h1>
  </div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
<form action="proses_login.php" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name='username' placeholder="user id">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name='password' placeholder="password">
  </div>

  <br>

  <div class="form-group">
    <button type="submit" name='simpan' class="btn btn-primary form-control">Log In</button>
  </div>
</form>


  </div>
  <div class="col-sm-4">
  </div>
</div>


<footer class="footer" style="background: white; border-color: black;">
  <div class="container">
    <div class="row text-center text-muted">
      <h5>.:Kursus:.</h5>
      <h6>Project. <b>Powered by Bootstrap</b>.</h6>
</footer>

</body>
</html>
