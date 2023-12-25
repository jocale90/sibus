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
                @foreach($rutas as $ruta)
                <option value="{{ $ruta->idruta }}">{{ $ruta->nombreruta }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="fechaInicio" class="col-sm-3 col-form-label">Desde:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control form-control-sm" id="fechaInicio">
            </div>
          </div>
          <div class="form-group row">
            <label for="fechaFin" class="col-sm-3 col-form-label">Hasta:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control form-control-sm" id="fechaFin">
            </div>
          </div>
          <div class="form-group row">
            <label for="busSelect" class="col-sm-3 col-form-label">Selecciona el bus:</label>
            <div class="col-sm-9">
              <select class="form-control form-control-sm" id="busSelect">
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
        <button type="button" class="btn btn-sm btn-info">Rotativas</button>
        <button type="button" class="btn btn-sm btn-info">Asistencia RRHH</button>
        <button type="button" class="btn btn-sm btn-info">Disponilibilidad Bus</button>
        <button type="button" class="btn btn-sm btn-info">Informe Ejec. Buses</button>
        <button type="button" class="btn btn-sm btn-success">Dia fuera de servicio</button>
        <button type="button" class="btn btn-sm btn-success">Dia libre</button>
      </div>
    </div>

    <!-- seccion de tablas -->
    <div class="row" id="tablashorarios">
      <div class="col-md-6 text-center">
        <table class="table table-sm table-bordered" id="tabla1">
          <thead style="color: white; background-color: gray;">
            <tr>
              <th>Sel</th>
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
            <tr>
              <td>1</td>
              <td>08:00</td>
              <td>10:30</td>
              <td>Bus A</td>
              <td>Juan Pérez</td>
              <td>Maria Rodríguez</td>
              <td>Pedro Gómez</td>
              <td>Observaciones...</td>
            </tr>
            <tr>
              <td>2</td>
              <td>11:00</td>
              <td>13:45</td>
              <td>Bus B</td>
              <td>Luis González</td>
              <td>Ana Martínez</td>
              <td>Sofía López</td>
              <td>Detalles...</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6 text-center">
        <table class="table table-sm table-bordered" id="tabla2">
          <thead style="color: white; background-color: #566d8c;">
            <tr>
              <th>Sel</th>
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
            <tr>
              <td>1</td>
              <td>09:30</td>
              <td>12:15</td>
              <td>Bus C</td>
              <td>Roberto Sánchez</td>
              <td>Elena Fernández</td>
              <td>David Pérez</td>
              <td>Información...</td>
            </tr>
            <tr>
              <td>2</td>
              <td>14:00</td>
              <td>16:45</td>
              <td>Bus D</td>
              <td>Marta López</td>
              <td>Pablo Ruiz</td>
              <td>Carlos Martín</td>
              <td>Comentarios...</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <!-- seccion de tablas -->
  </div>

  <!-- Scripts de Bootstrap (jQuery y Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    let fechaActual = new Date().toISOString().split('T')[0];
    document.getElementById('fechaInicio').value = fechaActual;
    document.getElementById('fechaFin').value = fechaActual;
  </script>
  
<script>
$(document).ready(function() {
  $('#rutaSelect').change(function() {
    var rutaSeleccionada = $(this).val();

    $.ajax({
      url: "{{ route('ListadoIdaVuelta') }}",
      method: 'get',
      data: { ruta: rutaSeleccionada },
      success: function(data) {
        $('#tabla1 tbody').empty(); 
        $.each(data.tabla1, function(index, row) {
          var newRow = '<tr>' +
              '<td><input type="checkbox"></td>' +
              '<td>' + row.horasalida + '</td>' +
              '<td>' + row.horallegada + '</td>' +
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
              '<td><input type="checkbox"></td>' +
              '<td>' + row.horasalida + '</td>' +
              '<td>' + row.horallegada + '</td>' +
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