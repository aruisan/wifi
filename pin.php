<?php
session_start();
session_destroy();

?>
  		<!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/mydesign/css/registrar.css">   


        <?php require_once('cuerpo/encabezado.php'); ?>


<?php
    if($_GET['estado']==1)
    { ?>
    
<center>
    <h1>su codigo es: <?= $_GET['respuesta']; ?></h1>
</center>


<?php } ?>



<a href="http://128.138.148.1" title="Ir la página anterior" class="btn btn-success">Ingresar Codigo</a>
