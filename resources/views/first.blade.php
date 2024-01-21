<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dividir pantalla en dos partes iguales con Bootstrap</title>
  <!-- Enlace al archivo CSS de Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #CCCCCC;">


 <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="#">SIBUS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Rotativas</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            @foreach($infosibus as $info)
               EMPRESA {{ $info->nombre }}
            @endforeach
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="infosibusDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Empresas 
          </a>
          <div class="dropdown-menu" aria-labelledby="infosibusDropdown">
            @foreach($sib_empresas_buses as $info)
              <a class="dropdown-item" href="#">{{ $info->nombre }}</a>
            @endforeach
          </div>
        </li>

        <!-- Nuevo elemento para el botón de cierre de sesión -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 text-center">
        <p>Selecciona la ruta y fechas</p>
        <form>
          <div class="form-group row">
            <label for="rutaSelect" class="col-sm-3 col-form-label">Selecciona la ruta:</label>
            <div class="col-sm-9">
              <select class="form-control form-control-sm" id="rutaSelect">
                <option value="" disabled selected>Seleccione una ruta</option>
                @foreach($rutas as $ruta)
                <option value="{{ $ruta->idruta }}">{{ $ruta->nombreruta }} </option>
                @endforeach
              </select>
              <input type="hidden" name="idempresa" id="idempresa" value="{{ $idEmpresaCon }}" >
            </div>
          </div>
          <div class="form-group row">
            <label for="fechaInicio" class="col-sm-3 col-form-label">Desde:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control form-control-sm" id="fechaida">
            </div>
          </div>
          <div class="form-group row">
            <label for="fechaFin" class="col-sm-3 col-form-label">Hasta:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control form-control-sm" id="fechavuelta">
            </div>
          </div>
          <div class="form-group row">
            <label for="busSelect" class="col-sm-3 col-form-label">Selecciona el bus:</label>
            <div class="col-sm-9">
              <select class="form-control form-control-sm" id="busSelect">
                <option value="" disabled selected>Seleccione un Bus</option>
                @foreach($buses as $bus)
                <option value="{{ $bus->idbus }}">{{ $bus->nbus }} {{ $bus->patente }}</option>
                @endforeach
              </select>
            </div>
          </div>

        </form>
      </div>
      <div class="col-md-6 text-center">
        <!-- Formulario en la segunda columna -->
        <p>Selecciona el personal</p>
        <form>
          <div class="form-group row">
            <label for="conductor1" class="col-sm-3 col-form-label">Conductor 1:</label>
            <div class="col-sm-9">
              <select class="form-control form-control-sm" id="conductor1">
                <option value="" disabled selected>Seleccione un Conductor</option>
                @foreach($conductores as $conductor)
                <option value="{{ $conductor->idconductor }}">{{ $conductor->nombre }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="conductor2" class="col-sm-3 col-form-label">Conductor 2:</label>
            <div class="col-sm-9">
              <select class="form-control form-control-sm" id="conductor2">
                <option value="" disabled selected>Seleccione conductor 2</option>
                @foreach($conductores as $conductor)
                <option value="{{ $conductor->idconductor }}">{{ $conductor->nombre }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="auxiliar" class="col-sm-3 col-form-label">Auxiliar:</label>
            <div class="col-sm-9">
              <select class="form-control form-control-sm" id="auxiliar">
                <option value="" disabled selected>Seleccione Auxiliar</option>
                @foreach($conductores_a as $conductor)
                <option value="{{ $conductor->idconductor }}">{{ $conductor->nombre }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nota" class="col-sm-3 col-form-label">Nota:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" id="nota">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-sm btn-success">Guardar</button>
        <button type="button" class="btn btn-sm btn-warning">Editar</button>
        <button type="button" class="btn btn-sm btn-danger">Borrar</button>
        <button type="button" class="btn btn-sm btn-light">Limpiar</button>
        <button id="botonbuscar" type="button" class="btn btn-sm btn-info">Buscar</button>
        
        <!-- <button type="button" class="btn btn-sm btn-info">Asistencia RRHH</button>
        <button type="button" class="btn btn-sm btn-info">Disponilibilidad Bus</button>
        <button type="button" class="btn btn-sm btn-info">Informe Ejec. Buses</button>
        <button type="button" class="btn btn-sm btn-success">Dia fuera de servicio</button>
        <button type="button" class="btn btn-sm btn-success">Dia libre</button> -->

      </div>
    </div>

    <!-- seccion de tablas -->
    <div class="row" id="tablashorarios">
      <div class="col-md-6 text-center">
        <table class="table table-sm table-bordered" id="tabla1">
          <thead style="color: white; background-color: gray;">
            <tr>
              <th>Sel</th>
              <th>IDservicio</th>
              <th>Fecha Salida</th>
              <th>Salida</th>
              <th>Llegada</th>
              <th>Bus</th>
              <th>Conductor 1</th>
              <th>Conductor 2</th>
              <th>Auxiliar</th>
              <th>Nota</th>
            </tr>
          </thead>
          <tbody style="color: black; background-color: white;">

          </tbody>
        </table>
      </div>
      <div class="col-md-6 text-center">
        <table class="table table-sm table-bordered" id="tabla2">
          <thead style="color: white; background-color: #566d8c;">
            <tr>
              <th>Sel</th>
              <th>IDservicio</th>
              <th>Fecha Salida</th>
              <th>Salida</th>
              <th>Llegada</th>
              <th>Bus</th>
              <th>Conductor 1</th>
              <th>Conductor 2</th>
              <th>Auxiliar</th>
              <th>Nota</th>
            </tr>
          </thead>
          <tbody style="color: black; background-color: white;">

          </tbody>
        </table>
      </div>
    </div>


    <!-- seccion de tablas -->
  </div>


  <div class="modal" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estamos procesando su busqueda</h5>
        </div>
        <div class="modal-body text-center">
              <div class="spinner-border spinner-border-lg text-center" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  
  <div class="modal" id="modalmensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleccione una ruta</h5>
        </div>
        <div class="modal-body text-center">
            <div>Seleccione una ruta para realizar la busqueda</div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="miModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estamos procesando su busqueda</h5>
        </div>
        <div class="modal-body text-center">
                <h3>No hay resultados para su busqueda</h3>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts de Bootstrap (jQuery y Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    let fechaActual = new Date().toISOString().split('T')[0];
    document.getElementById('fechaida').value = fechaActual;
    document.getElementById('fechavuelta').value = fechaActual;
  </script>
  
<script>
$(document).ready(function()
{


        $('.checkbox-registro').on('click', function ()
        {
            // Aquí puedes realizar acciones adicionales al hacer clic en el checkbox
            alert('Checkbox clickeado');
            
            // También puedes llamar a la función verificarChoques si es necesario
            /* verificarChoques($(this)); */
        });



        /*function verificarChoques(checkbox)
        {
            // Obtiene la fila actual del checkbox
            var filaActual = checkbox.closest('tr');

            // Obtiene la fecha y hora del registro actual
            var fechaSalida = filaActual.find('.fecha-salida').text();
            var horaSalida = filaActual.find('.hora-salida').text();
            var horaLlegada = filaActual.find('.hora-llegada').text();

            // Compara con otros registros solo en la misma tabla
            filaActual.siblings().each(function () {
                var otraFechaSalida = $(this).find('.fecha-salida').text();
                var otraHoraSalida = $(this).find('.hora-salida').text();
                var otraHoraLlegada = $(this).find('.hora-llegada').text();

                // Lógica para verificar choques de fechas y horas
                if (fechaSalida === otraFechaSalida) {
                    if ((horaSalida <= otraHoraLlegada && horaLlegada >= otraHoraSalida) ||
                        (otraHoraSalida <= horaLlegada && otraHoraLlegada >= horaSalida)) {
                        alert('¡Choque de fechas y horas en la misma tabla!');
                        // Aquí puedes realizar las acciones que necesites cuando hay un choque
                    }
                }
            });
        }

        // Selecciona todos los checkboxes con la clase 'checkbox-registro'
          $(".checkbox-registro").click(function() {
            alert("se hizo click");
            return false;
            verificarChoques($(this));
        });
      */


          $("#botonbuscar").click(function()
          {

            if ($("#rutaSelect").val() < 1)
            {
                $("#modalmensaje").modal("show");
                return false;
            }
            
            $("#miModal").modal("show");
            
            var rutaSeleccionada = $("#rutaSelect").val();
            var empresaactual    = $("#idempresa").val();
            var fechaida    = $("#fechaida").val();
            var fechavuelta    = $("#fechavuelta").val();

            $.ajax({
              url: "{{ route('ListadoIdaVuelta') }}",
              method: 'get',
              data: { ruta: rutaSeleccionada,
                      empresa: empresaactual,
                      fechaida: fechaida,
                      fechavuelta: fechavuelta,
                    },
              
              success: function(data) {


                $("#miModal").modal("hide");

                if (data.viajecorto === 1) {
                    $('#conductor2').prop('disabled', true);
                }


                $('#tabla1 tbody').empty(); 
                $.each(data.tabla1, function(index, row) {
                  var newRow = '<tr>' +
                      '<td><input type="checkbox" class="checkbox-registro"></td>' +
                      '<td>' + row.idservicio + '</td>' +
                      '<td class="fecha-salida">' + row.fechasalida + '</td>' +
                      '<td class="hora-salida">' + row.horasalida + '</td>' +
                      '<td class="hora-llegada">' + row.horallegada + '</td>' +
                      '<td>' + row.bus + '</td>' +
                      '<td>' + row.conductor1 + '</td>' +
                      '<td>' + row.conductor2 + '</td>' +
                      '<td>' + row.auxiliar + '</td>' +
                      '<td></td>' +
                    '</tr>';
                  $('#tabla1 tbody').append(newRow);
                });

                $('#tabla2 tbody').empty(); 
                $.each(data.tabla2, function(index, row) {
                  var newRow = '<tr>' +
                      '<td><input type="checkbox" class="checkbox-registro"></td>' +
                      '<td>' + row.idservicio + '</td>' +
                      '<td class="fecha-salida">' + row.fechasalida + '</td>' +
                      '<td class="hora-salida">' + row.horasalida + '</td>' +
                      '<td class="hora-llegada">' + row.horallegada + '</td>' +
                      '<td>' + row.bus + '</td>' +
                      '<td>' + row.conductor1 + '</td>' +
                      '<td>' + row.conductor2 + '</td>' +
                      '<td>' + row.auxiliar + '</td>' +
                      '<td></td>' +
                    '</tr>';
                  $('#tabla2 tbody').append(newRow);
                });
              },
              
              error: function(error) {
                console.error('Error:', error);
              }
            
            
            });
          });



});








</script>

</body>

</html>