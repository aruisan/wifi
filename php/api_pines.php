<?php
		require_once('../cp/api.php');
		$API = new routeros_api();
		$API->debug = false;


		$ipRouteros = '172.16.22.25';
		$Username = 'userApi';
		$Pass = 'oskr2014';
		$api_puerto = 8728;
		
		if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) 
		{
		
			function randomcrap()
			{
			$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
			$numerodeletras=4; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
				for($i=0;$i<$numerodeletras;$i++)
				{
					$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
					entre el rango 0 a Numero de letras que tiene la cadena */
				}
				return $cadena;
			}//randomcrap	

			$codigo = 0;

			do {
			    $codigo=randomcrap();

				$sql="SELECT * FROM pines WHERE key_pin = '$codigo'";
				$consulta = $conexion->query($sql);
			} while ($consulta->num_rows > 0);

			$sql2 = "INSERT INTO `pines`(`key_pin`) VALUES('$codigo')";
			$insertar = $conexion->query($sql2);

				if($insertar)
				{
					$API->write("/ip/hotspot/user/add", false);
					$API->write("=name=".$codigo, false);
					$API->write("=limit-uptime=03:00:00", false);
					$API->write("=disabled=no", false);
					$API->write("=limit-bytes-total=400M", true);
					$READ = $API->read(false);
					$ARRAY = $API->parse_response($READ);

					$respuesta= $codigo;
					$estado = 1;
				}else{
					$respuesta = "no genera codigo";
					$estado = 0;
				}

				header('location:../pin.php?respuesta='.$respuesta.'&estado='.$estado);

			}

?>