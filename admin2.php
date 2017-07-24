

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin wifi</title>



     <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

        <!-- MetisMenu CSS -->
    	<link href="assets/metisMenu/metisMenu.min.css" rel="stylesheet">

         <!-- datatables -->
        <link rel="stylesheet" href="assets/datatables/css/datatables.bootstrap.min.css">  
        <link rel="stylesheet" href="assets/datatables/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="assets/datatables/css/buttons.datatables.min.css">

        <!-- fa fa -->
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">

         <link rel="stylesheet" href="assets/mydesign/css/graficas.css">  


    

    <!-- Custom CSS -->
    <link href="assets/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/morrisjs/morris.css" rel="stylesheet">

   


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
                        <li>
                            <a href="" id="visitantes"><i class="fa fa-indent fa-fw"></i> Visitantes </a>
                        </li>
                        <li>
                            <a href="" id="reportes"><i class="fa  fa-users fa-fw"></i> Reportes </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            


           
        </div>
        <!-- /#page-wrapper -->
        <div class="grafica">
            <h1 ></h1>
            <div id="chart"></div>
            <button id="bar" type="button" class="btn btn-success">
                <span class="fa fa-bar-chart"></span>
                Gráfica de barras
            </button>
            <button id="pie" class="btn btn-success">
                <span class="fa fa-pie-chart"></span>
                Gráfica circular o de tarta
            </button>
            <button id="donut" class="btn btn-success">
                <span class="fa fa-circle-o-notch"></span>
                Gráfica de rosca
            </button>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jquery -->
 		<script src="assets/mydesign/js/jquery.js"></script>
        <script src="assets/mydesign/js/jquery_mobile.min.js"></script>

         <!-- bootstrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js" ></script>

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

         <!-- d3-->
        <script src="assets/d3/d3.min.js"></script>

	   

     	<!-- design -->
        <script src="assets/mydesign/js/admin.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            addChart();
        });
            var chartData = [
            ['tacos', 30],
            ['hamburguesas', 50],
            ['helados', 28]
            ];


    function addChart()
    {
        chart = generate({
            bindto: "#chart",
            data:{
                type: 'bar',
                columns: chartData,

                colors:{
                tacos: '#265a88',
                paella: '#419641',
                hamburguesas: '#2aabd2',
                helados: '#eb9316'
            },
            names:{
                tacos: 'Tacos al pastor',
                paella: 'Paella Valenciana',
                hamburguesas: 'hambur',
                helados: 'helados de crema'
            }
        },
        bar:{
            width: {
                ratio: 1
            }
        },
        tooltip: {
            format: {
                title: function(x) {
                    return 'Estado de votación';
                }
            }
        },
        axis: {
            rotated: false,
            y: {
                label: 'Cantidad de votos'
            },
            x: {
                show: true,
                label: 'Comidas'
            }
        },
        donut: {
            title: "La comida favorita"
        }
            },
        })
    }
        </script>



</body>

</html>
