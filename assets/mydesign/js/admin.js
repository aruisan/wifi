$(document).ready(function(){
	tablaUsuarios();
});



///////////botones ////////////////////

$('#visitantes').click(function(event){ event.preventDefault(); tablaUsuarios(); ocultarReportes();});
$('#preguntas').click(function(event){ event.preventDefault(); tablaPreguntas(); ocultarReportes();});
$('#fecha').click(function(event){ event.preventDefault(); cargarbuscarFecha(); });
$('#usuario').click(function(event){ event.preventDefault(); tablaFuncionarios(); });
$('#storeFuncionario').click(function(event){ event.preventDefault(); storeFuncionario(); });
$('#updateFuncionario').click(function(event){ event.preventDefault(); updateFuncionario(); });
$('#updatePregunta').click(function(event){ event.preventDefault(); updatePregunta(); });


///////////////////////////////////funcionarios crud
function  editFuncionario(id)
{
	var url = "php/crud_funcionarios.php";
	var metodo = "editFuncionarios";
	$.post( url,{id:id, metodo:metodo}, function(data){
	 console.log(data);
     datos = jQuery.parseJSON(data);
     $('#form_editar_funcionario input[name=name]').val(datos.nick);
     $('#form_editar_funcionario input[name=password]').val(datos.password);
     $('#form_editar_funcionario input[name=id]').val(datos.id_funcionario);
     if(datos.rol=='ADMINISTRADOR')
	       {      
	               $('#rol').find("option[value='ADMINISTRADOR']").remove();
	               $('#rol').append('<option value="'+datos.rol+'" selected="selected">'+datos.rol+'</option>');                 
	       }else if(datos.rol=='ESPECTADOR')
	       {
	               $('#rol').find("option[value='ESPECTADOR']").remove();
	               $('#rol').append('<option value="'+datos.rol+'" selected="selected">'+datos.rol+'</option>');
	       }

	});
}


function  storeFuncionario()
{
	var url = "php/crud_funcionarios.php";
	var metodo = "&metodo=storeFuncionarios";
	var data = $('#form_crear_funcionario').serialize();

	$.post( url,data+metodo, function(data){
	   if(data == 1){
	   		tablaFuncionarios();
	   }else{
	   	console.log('error');
	   }
	});
}

function updateFuncionario()
{
	var url = "php/crud_funcionarios.php";
	var metodo = "&metodo=updateFuncionarios";
	var data = $('#form_editar_funcionario').serialize();

	$.post( url,data+metodo, function(data){
	   if(data == 1){
	   		tablaFuncionarios();
	   }else{
	   	console.log('error');
	   }
	});
}

function editarActivoFuncionario(id)
{
	
	var url = "php/crud_funcionarios.php";
	var metodo = "activoFuncionarios";
	$.post( url,{id:id, metodo:metodo}, function(data){
		if(data == 1){
			tablaFuncionarios();
		}else {
			console.log('error');
		}

	});

}
///////////////////////////////////////

function  tablaFuncionarios()
{
	var url = "php/tabla_funcionarios.php";
	$.post( url, function(data){
	$('#div_tabla').html(data);
	});
}

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


function editarActivoPregunta(id)
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

function editarPregunta(id)
{
	var url = "php/editar_pregunta.php";
	var metodo = "editPregunta";
	$.post( url,{id:id, metodo:metodo}, function(data){
		 console.log(data);
     	datos = jQuery.parseJSON(data);
     	$('#form_editar_pregunta input[name=pregunta]').val(datos.pregunta);
     	$('#form_editar_pregunta input[name=id]').val(datos.id_encuesta);
	});
}

function updatePregunta()
{
	var url = "php/editar_pregunta.php";
	var metodo = "&metodo=updatePregunta";
	var data = $('#form_editar_pregunta').serialize();
	$.post( url,data+metodo, function(data){
		if(data == 1){
			tablaPreguntas();
		}else {
			console.log('error');
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


