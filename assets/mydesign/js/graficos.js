
var chart;

$('#genero, #ocupacion, #dispositivo, #ciudad').click(function(event){event.preventDefault(); traerDatos(this.id); ocultarTabla(); });






///////////////////bontones///////

$('.bar, .pie, .donut').click(function(){ transformChart(this.id); });


/////////////////otros//////////

function transformChart(id)
{
    chart.transform(id);
}

function ocultarTabla()
{
    $('#div_tabla').hide();
    $('#grafica').show();
}

///////////////ajax graficos/////


function traerDatos(tipo)
{
    var url = "php/graficos.php";
    var metodo = tipo+"Graficos";
    $.post(url,{metodo:metodo}, function(data){
        console.log(data);
        datos = jQuery.parseJSON(data);
        self[metodo](datos);
        $('#titulo_graficos').text('Graficas de '+tipo);
    });
}

function traerDatosPreguntas(id)
{
    var url = "php/graficos.php";
    var metodo = "preguntaGraficos";
    $.post(url,{metodo:metodo, id:id}, function(data){
        $('.tittle').text('Grafico de pregunta #'+id);
        datos = jQuery.parseJSON(data);
        preguntaGraficos(datos);
    });
}

function  traerDatosfecha()
{
    var url = "php/graficos.php";
    var metodo = "fechaGraficos";
    var datos = $('#form_graficar_fecha').serialize();

    $.post(url,datos+'&metodo='+metodo, function(data){
        console.log(data);
        if(data == 0){
            $('#grafica_fecha').hide();
            $('#resp_fecha').show().html('<div class="alert alert-danger text-center">las fechas estan vacias</div>');
            setTimeout(function(){$('#resp_fecha').hide();  }, 3000);
        }else if(data == 1){
            $('#grafica_fecha').hide();
            $('#resp_fecha').show().html('<div class="alert alert-danger text-center">las fechas son mayores a la fecha de hoy</div>');
            setTimeout(function(){$('#resp_fecha').hide();  }, 3000);
        }else if(data == 2){
            $('#grafica_fecha').hide();
            $('#resp_fecha').show().html('<div class="alert alert-danger text-center">las fecha Inicio es mayor a la fecha final</div>');
             setTimeout(function(){$('#resp_fecha').hide();  }, 3000);
        }else{
            datos = jQuery.parseJSON(data);
            fechaGrafico(datos);
            $('#grafica_fecha').show();
        }
    });
}


/////////////graficos ////////////

function generoGraficos(datos)
{      
    var chartData = [
    ['FEMENINO', datos[0]['invitado']],
    ['MASCULINO',datos[1]['invitado']],
    ['OTROS', datos[2]['invitado']]
    ];

    chart = c3.generate({
        bindto: "#chart",
        data:{
            type: 'bar',
            columns: chartData
        },
    })
}


function ocupacionGraficos(datos)
{      
    var chartData = [
    ['COMERCIANTE', datos[0]['invitado']],
    ['EMPLEADO',datos[1]['invitado']],
    ['ESTUDIANTE', datos[2]['invitado']],
    ['INDEPENDIENTE', datos[3]['invitado']],
    ['TURISTA', datos[4]['invitado']]
    ];

    chart = c3.generate({
        bindto: "#chart",
        data:{
            type: 'bar',
            columns: chartData
        },
    })
}

function ciudadGraficos(datos)
{      
    var chartData = [];
    for (var i=0; i<datos.length; i++) {
        chartData.push([datos[i]['ciudad'], datos[i]['conteo']]);
    }
    console.log(chartData);
   /* var chartData = [
    ['CELULAR', datos[0]['invitado']],
    ['IPAD',datos[1]['invitado']],
    ['OTROS', datos[2]['invitado']],
    ['PORTATIL', datos[3]['invitado']]
    ];*/

    chart = c3.generate({
        bindto: "#chart",
        data:{
            type: 'bar',
            columns: chartData
        },
    })
}

function dispositivoGraficos(datos)
{      
    var chartData = [
    ['CELULAR', datos[0]['invitado']],
    ['IPAD',datos[1]['invitado']],
    ['OTROS', datos[2]['invitado']],
    ['PORTATIL', datos[3]['invitado']]
    ];

    chart = c3.generate({
        bindto: "#chart",
        data:{
            type: 'bar',
            columns: chartData
        },
    })
}

function preguntaGraficos(datos)
{      
    var chartData = [
    ['EXCELENTE', datos[1]['conteo']],
    ['BUENA',datos[0]['conteo']],
    ['REGULAR', datos[3]['conteo']],
    ['MALA', datos[2]['conteo']]
    ];

    chart = c3.generate({
        bindto: "#chart2",
        data:{
            type: 'bar',
            columns: chartData
        },
    })
}

function fechaGrafico(datos)
{
    var chartData = [];
    for (var i=0; i<datos.length; i++) {
        chartData.push([datos[i]['fecha'], datos[i]['conteo']]);
    }
    console.log(chartData);

    chart = c3.generate({
        bindto: "#chart3",
        data:{
            type: 'bar',
            columns: chartData
        },
    })
}
