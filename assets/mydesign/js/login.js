
$(document).ready(function(){ 
});
//----------------------------------Validar formulario botones-------------------------------

//***************************************botones***********************************************
//**********************************************************************************************



        //--------------------------------------

$('input[name=ndc]').change(function(){
    var tipo = "cedula";
    funcionAutenticar(tipo);
});

$('#ingresar').on('click', function(event){
    event.preventDefault();
    var tipo = "cedula";
    if($("#terminos").is(':checked')) {  
             funcionConfirmar(tipo);
        } else {  
            $('#resp-terminos').html('<div class="alert alert-danger">debe leer y aceptar Terminos y Condiciones</div>');  
        }  
});


        //--------------------------------------

$('input[name=email]').change(function(){
    var tipo = "email";
    funcionAutenticarEmail(tipo);
});


//**********************************function de validacion********************************
//***************************************************************************************

                //-------------------------------------

function funcionConfirmar(tipo)
{
            var url = "php/autentica_cc.php";
            var datos =  $('input[name=ndc_a]').val();
            $('input[name=ndc]').val(datos);
            $.ajax({
                url: url,
                type: "POST",
                data: {datos:datos, proceso:tipo},
                success: function(data)
                {
                    console.log(data);
                    if(data > 0){
                        funcionIngresar();
                    }else{
                        $('#form_autenticar').hide('slow');
                        $('#form_registro').show('slow'); 
                    }
                }
            });
}



function funcionAutenticar(tipo)
{
            var url = "php/autentica_cc.php";
            var datos =  $('input[name=ndc]').val();
            $.ajax({
                url: url,
                type: "POST",
                data: {datos:datos, proceso:tipo},//('datos='+datos, 'proceso='+proceso),
                success: function(data)
                {
                                            console.log(data);
                    if(data > 0){
                        mostrarMensajeErrrorAutenticacion();
                        $('input[name=ndc]').removeAttr("disabled");  
                        $('#mensaje-autenticacion').show('low').html('<span>Cedula Ya registrada pulsa el boton Ingresar:</span> <a href="usuario.php?cc='+datos+'" class="btn btn-primary">Ingresar</a>');
                    }else{
                        mostrarmensajeAutenticacion();
                    }
                }
            });
}


function funcionAutenticarEmail(tipo)
{
            var url = "php/autentica_cc.php";
            var datos =  $('input[name=email]').val();
            $.ajax({
                url: url,
                type: "POST",
                data: {datos:datos, proceso:tipo},//('datos='+datos, 'proceso='+proceso),
                success: function(data)
                {
                    console.log(data);
                    if(data > 2){
                        mostrarMensajeErrrorAutenticacion();
                        $('input[name=email]').removeAttr("disabled");  
                        $('#mensaje-autenticacion').show('low').text('Correo Ya registrado con la cedula '+data+' : en caso de no acordarse contactenos por correo');
                    }else if(data == 0){
                        mostrarmensajeAutenticacion();
                    }
                }
            });
}


function funcionIngresar()
{
   var datos =  $('input[name=ndc_a]').val();
   window.location.href = "usuario.php?cc="+datos;
}

function mostrarMensajeErrrorAutenticacion()
{
    $("select, input, #enviar").attr('disabled','disabled'); 
}
function mostrarmensajeAutenticacion()
{
    $("select,  input, #enviar").removeAttr("disabled");
    $('#mensaje-autenticacion').hide('low');
}





//********************************function de procesos **********************************
//***************************************************************************************

 function mostrarMensajeError()
 {
    $('#mensaje').show('low');
    setTimeout(function()
    {
        $('#mensaje').hide('low');
    }, 4000);
 }


/*----------------------------------fin-----------------------------------------*/
