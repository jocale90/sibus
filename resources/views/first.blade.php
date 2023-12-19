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
      <!--   <li class="nav-item active">
          <a class="nav-link" href="#">Encomiendas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ventas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestión SII</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tráfico</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Maestros</a>
        </li> -->
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
                      <option value="{{ $bus->idbus }}">{{ $bus->nbus }}  {{ $bus->patente }}</option>
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
</div>

<!-- Scripts de Bootstrap (jQuery y Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
