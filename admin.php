

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin wifi</title>
    <style type="text/css">
        .ocultar{
            display: none;
        }
    </style>



     <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Load c3.css -->
    <link href="assets/c3/c3.css" rel="stylesheet" type="text/css">
        <!-- MetisMenu CSS -->
    	<link href="assets/metisMenu/metisMenu.min.css" rel="stylesheet">

         <!-- datatables -->
        <link rel="stylesheet" href="assets/datatables/css/datatables.bootstrap.min.css">  
        <link rel="stylesheet" href="assets/datatables/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="assets/datatables/css/buttons.datatables.min.css">

        <!-- fa fa -->
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">


    

    <!-- Custom CSS -->
    <link href="assets/c3/c3.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="assets/morrisjs/morris.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="assets/mydesign/css/graficas.css">  

   


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">OTIC/GIRARDOT</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Editar Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="active">
                            <a href="#"><i class="fa fa fa-tasks fa-fw"></i> Administrar </a>
                            <ul class="nav nav-second-level collapse in">
                                <li>
                                    <a href="" id="preguntas"><i class="fa fa-question fa-fw"></i> Preguntas </a>
                                </li>
                                <li>
                                    <a href="" id="usuario"><i class="fa fa-users fa-fw"></i> Usuarios </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> 
                        <li class="active">
                            <a href="#"><i class="fa fa-line-chart fa-fw"></i> Reportes Usuarios </a>
                            <ul class="nav nav-second-level collapse in">
                                 <li>
                                    <a href="" id="visitantes"><i class="fa fa-indent fa-fw"></i>Datos</a>
                                </li>
                                <li>
                                    <a href="" id="genero"><i class="fa fa fa-venus-mars fa-fw"></i> Graficas Genero </a>
                                </li>
                                <li>
                                    <a href="" id="ocupacion"><i class="fa fa fa-briefcase fa-fw"></i> Graficas Ocupacion </a>
                                </li>
                                 <li>
                                    <a href="" id="ciudad"><i class="fa fa-location-arrow fa-fw"></i> Graficas Ciudad </a>
                                </li>
                                <li>
                                    <a href="" id="dispositivo"><i class="fa fa-fax fa-fw"></i> Graficas Dispositivo </a>
                                </li>
                                <li>

                                    <a href="" id="fecha" data-toggle="modal" data-target="#modal-graficar-fecha"><i class="fa fa-fax fa-fw"></i> Graficas por Fecha </a>

                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>            
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div id="div_tabla"></div>

            <div id="grafica" class="grafica ocultar">
                <h1 id="titulo_graficos"></h1>
                <div id="chart"></div>
                <button  id="bar" type="button" class="bar btn btn-success">
                    <span class="fa fa-bar-chart"></span>
                    Gráfica de barras
                </button>
                <button  id="pie" class="pie btn btn-success">
                    <span class="fa fa-pie-chart"></span>
                    Gráfica circular o de tarta
                </button>
                <button  id="donut" class="donut btn btn-success">
                    <span class="fa fa-circle-o-notch"></span>
                    Gráfica de rosca
                </button>
            </div>
           
        </div>




<!-- Modal -->
<div class="modal fade" id="modal-crear-pregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary">creacion de pregunta</h4>
      </div>
      <div class="modal-body">
        <form  id="form_create_pregunta" class="navbar-form" role="form">
        <center>
            <div class="input-group">
                <span class="input-group-addon text-primary">¿?</span>
                <input type="text" class="form-control" name="pregunta" id="pregunta" placeholder="escribe tu pregunta">
            </div>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" id="storePregunta" >Crear</button>
        </center>
      </form>
      </div>
    </div>
  </div>
</div>

!-- Modal -->
<div class="modal fade" id="modal-editar-pregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-success">Edicion de pregunta</h4>
      </div>
      <div class="modal-body">
        <form  id="form_editar_pregunta" class="navbar-form" id="form-create-dueno" role="form">
        <center>
            <div class="input-group">
                <span class="input-group-addon text-success">¿?</span>
                <input type="text" class="form-control" name="pregunta"  placeholder="escribe tu pregunta">
                <input type="hidden" name="id">
            </div>
            <button type="submit" class="btn btn-success" data-dismiss="modal" id="updatePregunta" >Editar</button>
        </center>
      </form>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
<div class="modal fade" id="modal-graficar-fecha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Grafica Por Fecha</h4>
      </div>
      <div class="modal-body">
        <div id="busqueda">
        
        </div>
        <div id="grafica_fecha" class="ocultar">
                <div id="chart3"></div>
                <button id="bar" type="button" class="bar btn btn-success">
                    <span class="fa fa-bar-chart"></span>
                    Gráfica de barras
                </button>
                <button id="pie" class="pie btn btn-success">
                    <span class="fa fa-pie-chart"></span>
                    Gráfica circular o de tarta
                </button>
                <button id="donut" class="donut btn btn-success">
                    <span class="fa fa-circle-o-notch"></span>
                    Gráfica de rosca
                </button>
            </div>
            <div id="resp_fecha" class="ocultar"></div>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Modal -->
<div class="modal fade" id="modal-crear-funcionario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary">Formulario Ingreso Funcionario</h4>
      </div>
      <div class="modal-body">
      <center>
           <form id="form_crear_funcionario" class="navbar-form">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle text-primary" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="name"  placeholder="NICK Funcionario">
                </div>
                <select name="rol" class="form-control">
                    <option value="ESPECTADOR">ESPECTADOR</option>
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                </select>
                <button type="submit" class="btn btn-primary" data-dismiss="modal"  id="storeFuncionario" >Crear</button>
           </form>
        </center>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-editar-funcionario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-success">Formulario Editar Funcionario</h4>
      </div>
      <div class="modal-body">
      <center>
           <form id="form_editar_funcionario">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle text-success" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="name"  placeholder="NICK Funcionario">
                    <input type="hidden" name="id">   
                </div>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key text-success" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="password"  >
                </div>
                <select id="rol" name="rol" class="form-control">
                    <option value="ESPECTADOR">ESPECTADOR</option>
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                </select>
                <button type="submit" class="btn btn-success btn-block" data-dismiss="modal"  id="updateFuncionario" >Editar</button>
           </form>
        </center>
      </div>
    </div>
  </div>
</div>


        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jquery -->

 		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

         <!-- bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <!-- Metis Menu Plugin JavaScript -->
    	<script src="assets/metisMenu/metisMenu.min.js"></script>

         <!-- dtatables-->
        <script src="assets/datatables/js/jquery.datatables.min.js" ></script>
  	    <script src="assets/datatables/js/datatables.bootstrap.min.js" ></script>
  	    <script src="assets/datatables/js/datatables.responsive.min.js" ></script>
  	    <script src="assets/datatables/js/datatables.buttons.min.js" ></script>
        <script src="assets/datatables/js/buttons.flash.min.js" ></script>
        <script src="assets/datatables/js/buttons.html5.min.js" ></script>
        <script src="assets/datatables/js/buttons.print.min.js" ></script>
        <script src="assets/datatables/js/jszip.min.js" ></script>
        <script src="assets/datatables/js/pdfmake.min.js" ></script>
        <script src="assets/datatables/js/vfs_fonts.js" ></script>


	    <!-- Morris Charts JavaScript -->
	    <script src="assets/raphael/raphael.min.js"></script>
	    <script src="assets/morrisjs/morris.min.js"></script>

	    <!-- Custom Theme JavaScript -->
	    <script src="assets/sb-admin/js/sb-admin-2.min.js"></script>

         <!-- Latest compiled and minified JavaScript -->
   
    
        <script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
	   <!-- c3 -->
        <script src="assets/c3/c3.js"></script>


     	<!-- design -->
        <script src="assets/mydesign/js/admin.js"></script>
       <script src="assets/mydesign/js/graficos.js"></script>

</body>

</html>
