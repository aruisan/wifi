<!DOCTYPE HTML>
<html>
 <head>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script>
     $(function(){
        $("#formulario").on("submit", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "|imagen-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    console.log(datos);
                }
            });
        });
     });
    </script>
 </head>
 <body>
 <form method="post" id="formulario" enctype="multipart/form-data">
    Subir imagen: <input type="file" name="file">
    <input type="submit" value="enviar">
 </form>
  <div id="respuesta"></div>
 </body>
</html>
