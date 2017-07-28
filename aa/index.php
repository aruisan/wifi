  <?php
  session_start();
  session_destroy();
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Ingreso de Admin</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="../assets/fontawesome/css/font-awesome.min.css">
        <style type="text/css">

        body{
          background-color: #1d5191;
        }
        .form{
          background-color: rgba(256,256,256,.8);
          top: 20px;
          border-radius: 3%;
          border: 1px solid rgba(51,122,183,.5); 
          -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.28);
          -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.28);
          box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.28);

          }

        .logo{
          margin-top: 80px;
        }
        </style>

  </head>
  <body>
      <div class="logo">
        <center class="hidden-xs hidden-sm">
            <img src="../img/wifi3.png" width="20%">
        </center>
        <center class="hidden-md hidden-lg">
            <img src="../img/wifi3.png" width="30%">
        </center>
      </div>
      <div class="row">
        <div class="col-sm-3 col-md-4 col-lg-4"></div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <form class="form col-md-12 center-block" action="php/ingresar.php" method="POST">
            <h2 class="text-center text-primary">Logueo de Admin</h2>
            <div class="form-group">
              <input type="text" name="nick" class="form-control input-lg" placeholder="nick">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Entrar</button>
            </div>
          </form>
        </div>
      </div>

      <div class="logo row">
          <center class="hidden-xs hidden-sm">
            <img src="../img/otic.png" width="20%">
        </center>
        <center class="hidden-md hidden-lg">
            <img src="../img/otic.png" width="30%">
        </center>
      </div>
  <!-- script references -->
      <script src="../assets/mydesign/js/jquery.js"></script>
        <script src="../assets/mydesign/js/jquery_mobile.min.js"></script>

        <script src="../assets/bootstrap/js/bootstrap.min.js" ></script>
  </body>
</html>




      