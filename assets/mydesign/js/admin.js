$(document).ready(function(){
	tablaUsuarios();
});



///////////botones ////////////////////

$('#visitantes').click(function(event){ event.preventDefault(); tablaUsuarios(); ocultarReportes();});
$('#preguntas').click(function(event){ event.preventDefault(); tablaPreguntas(); ocultarReportes();});
$('#fecha').click(function(event){ event.preventDefault(); cargarbuscarFecha(); });


///////////////////////////////////////

function tablaUsuarios()
 {
 	var url = "php/tabla_usuarios.php";
	$.post( url, function(data){
	$('#div_tabla').html(data);
	});
	
 }


function ocultarReportes()
{
    $('#grafica').hide();
    $('#div_tabla').show();
}

function tablaPreguntas()
 {
 	var url = "php/tabla_preguntas.php";
	$.post( url, function(data){
	$('#div_tabla').html(data);
	});
 }


function editarPregunta(id)
{
	var url = "php/activarPregunta.php";
	$.post( url,{id:id}, function(data){
		if(data == 1){
			$("#"+id).removeClass('btn-warning').addClass('btn-success').text('Activo');
		}else if(data == 0){
			$("#"+id).removeClass('btn-success').addClass('btn-warning').text('Inactivo');
		}

	});
}

function storePregunta()
{
		var data = $("#form_create_pregunta").serialize();
	    var url = "php/crearPregunta.php";

        $.post(url, data, function(data){
        	console.log(data);
        	$('#pregunta').val('');
        	tablaPreguntas();

        });
}


function cargarbuscarFecha()
{
		var url = "php/buscarFecha.php";

        $.post(url, function(data){
        	$('#busqueda').html(data);


        });
}


