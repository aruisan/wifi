


      <form  id="form_graficar_fecha" class="navbar-form" id="form-create-dueno" role="form">
        <center>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-o fa-fw"></i> Inicial</span>
                <input type="date" class="form-control" name="ff_inicio">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-o fa-fw"></i> Final</span>
                <input type="date" class="form-control" name="ff_final">
            </div>
            <button type="submit" class="btn btn-primary" id="searchFecha"><i class="fa fa-search fa-fw"></i>  Buscar</button>
        </center>
      </form>


      <script type="text/javascript">
        $('#searchFecha').click(function(event){ event.preventDefault(); traerDatosfecha();});
      </script>