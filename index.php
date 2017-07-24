<?php
require_once('cp/conexion.php');

$sql = "SELECT ciudades.*, departamento.nombre AS departamento  FROM `ciudades`, departamento
WHERE ciudades.idDepartamento = departamento.idDepartamento
ORDER BY ciudades.nombre ASC";
$consulta = $conexion->query($sql);


?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Logueo de agenda Girardot</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">

         <!-- select -->
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-select/css/bootstrap-select.min.css">


        <link rel="stylesheet" href="assets/mydesign/css/registrar.css">     

    </head>

    <body>
                <?php require_once('cuerpo/encabezado.php'); ?>
                <div class="container ">
                        <div id="mensaje-autenticacion" class="alert alert-warning ocultar"></div>
                        <form id="form_autenticar" action="php/autenticar.php" method="POST">
                                <div class="row">
                                    <div class=" col-sm-2 col-md-2 col-lg-2"></div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-cc text-primary"></i></span>
                                                <input type="number" class="form-control" name="ndc_a"  placeholder="NUMERO DE DOCUMENTO">
                                                <span span class="input-group-btn"><button class="btn btn-primary" id="ingresar">INGRESAR</button></span>
                                            </div>
                                    </div> 
                                    <label id="label-terminos"><input type="radio" value="5" id="terminos">Al continuar acepta los <a href="img/terminos_condiciones_wifi_girardot.pdf"  target="_blank"> Terminos y condiciones.</a></label>

                                    <div id="resp-terminos"></div>
                                </div>
                        </form>


                        <form id="form_registro" class="ocultar" action="php/guardar.php" method="POST">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon text-primary"><i class="text-primary">Tipo de documento</i></span>
                                            <select class="form-control" name="tdc">
                                                <option value="CC">CC</option>
                                                <option value="TI">TI</option>
                                                <option value="CE">CE</option>
                                                <option value="RC">RC</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-cc text-primary"></i></span>
                                                <input type="number" class="form-control" name="ndc"  placeholder="NUMERO DE DOCUMENTO">
                                            </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar-o text-primary"></i></span>
                                            <input type="number" class="form-control" name="edad" placeholder="EDAD">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle text-primary"></i></span>
                                                <input type="text" class="form-control" name="nombre"  placeholder="NOMBRE COMPLETO">
                                            </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope-o text-primary"></i></span>
                                                <input type="email" class="form-control" name="email"  placeholder="CORREO ELECTRONICO">
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="text-primary">OCUPACION</i></span>
                                            <select class="form-control" name="ocupacion">
                                                <option value="EMPLEADO">EMPLEADO</option>
                                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                                                <option value="COMERCIANTE">COMERCIANTE</option>
                                                <option value="TURISTA">TURISTA</option>
                                                <option value="INDEPENDIENTE">INDEPENDIENTE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="text-primary">GENERO</i></span>
                                            <select class="form-control" name="genero">
                                                <option value="M">MASCULINO</option>
                                                <option value="F">FEMENINO</option>
                                                <option value="O">OTROS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker text-primary"></i></span>
                                            <select class="selectpicker" data-live-search="true" name="ciudad">
                                            <?php while($datos = $consulta->fetch_object()){ ?>
                                                <option value="<?= $datos->nombre; ?>" data-tokens="<?= $datos->nombre; ?>"><?= $datos->nombre.' ('.$datos->departamento.')'; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="radio margin-radio">
                                                <label class="checkbox-inline"><input type="radio" class="text-primary" name="dispositivo" value="IPAD">IPAD</label>
                                                <label class="checkbox-inline"><input type="radio" class="text-primary" name="dispositivo" checked="checked"  value="CELULAR">CELULAR</label>
                                                <label class="checkbox-inline"><input type="radio" class="text-primary" name="dispositivo" value="PORTATIL">PORTATIL</label>
                                                <label class="checkbox-inline"><input type="radio" class="text-primary" name="dispositivo" value="OTROS">OTROS</label>
                                            </div>   
                                        </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary pull-center" id="enviar">CREAR</button>
                                </div>
                                                  
                        </form>
                        <div id="mensaje" class="alert alert-danger">
                            <span class="text-center">Error al ingresar usuario</span>
                        </div>
                </div>
   

        <!-- Javascript -->
            
        <script src="assets/mydesign/js/jquery.js"></script>
        <script src="assets/mydesign/js/jquery_mobile.min.js"></script>

        <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="assets/bootstrap-select/js/bootstrap-select.min.js"></script>
         <script src="assets/mydesign/js/login.js"></script>
    </body>

</html>