<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Postulación - MotoTrabajo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body { background: #f0f2f5; }
    .header-brand {
      background: #1a1a2e;
      padding: 20px 0;
      text-align: center;
    }
    .header-brand img { max-width: 200px; }
    .card-form {
      border-left: 5px solid #007bff;
    }
    .section-title {
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .08em;
      color: #6c757d;
      margin-bottom: 0.75rem;
    }
    .input-group-text {
      min-width: 110px;
      justify-content: center;
      font-size: 0.85rem;
    }
    #div-exito { display: none; }
    #div-enviando { display: none; }
    .fuente-badge {
      background: #e8f4ff;
      border: 1px solid #b8daff;
      color: #004085;
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 0.9rem;
      display: inline-block;
    }
  </style>
</head>
<body>

<div class="header-brand">
  <img src="img/motoapp_logo_light.png" alt="MotoTrabajo">
</div>

<div class="container mt-4 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <!-- ÉXITO -->
      <div id="div-exito" class="card shadow-sm mb-4">
        <div class="card-body text-center py-5">
          <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
          <h4 class="text-success">¡Postulación enviada!</h4>
          <p class="text-muted">Hemos recibido tus datos. Pronto nos comunicaremos contigo.</p>
          <button class="btn btn-outline-primary mt-2" onclick="reiniciar()">
            <i class="fas fa-redo mr-1"></i>Nueva postulación
          </button>
        </div>
      </div>

      <!-- FORMULARIO -->
      <div id="div-formulario">
        <div class="card shadow-sm card-form mb-4">
          <div class="card-body">
            <h5 class="card-title mb-1">
              <i class="fas fa-motorcycle mr-2 text-primary"></i>Formulario de postulación
            </h5>
            <p class="text-muted small mb-4">Completa tus datos para iniciar el proceso de vinculación con MotoTrabajo.</p>

            <form id="form_postulacion" novalidate>

              <!-- Identificación -->
              <p class="section-title"><i class="fas fa-id-card mr-1"></i>Identificación</p>
              <div class="form-row mb-3">
                <div class="col-sm-5">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Tipo</span>
                    </div>
                    <select class="form-control" name="tipo_documento" id="tipo_documento" required>
                      <option value="">Seleccione</option>
                      <option value="cc">Cédula de Ciudadanía</option>
                      <option value="ex">Cédula de Extranjería</option>
                      <option value="pa">Pasaporte</option>
                      <option value="nit">NIT</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-7 mt-2 mt-sm-0">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Número ID</span>
                    </div>
                    <input type="text" class="form-control" name="identificacion" id="identificacion"
                      placeholder="Ej: 1234567890" required>
                  </div>
                </div>
              </div>

              <!-- Nombre -->
              <p class="section-title mt-3"><i class="fas fa-user mr-1"></i>Datos personales</p>
              <div class="form-row mb-3">
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nombres</span>
                    </div>
                    <input type="text" class="form-control" name="nombres" id="nombres" required>
                  </div>
                </div>
                <div class="col-sm-6 mt-2 mt-sm-0">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Apellidos</span>
                    </div>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                  </div>
                </div>
              </div>

              <!-- Contacto -->
              <p class="section-title mt-3"><i class="fas fa-phone mr-1"></i>Contacto</p>
              <div class="form-row mb-3">
                <div class="col-sm-4">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Teléfono</span>
                    </div>
                    <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Fijo">
                  </div>
                </div>
                <div class="col-sm-4 mt-2 mt-sm-0">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Celular</span>
                    </div>
                    <input type="tel" class="form-control" name="celular" id="celular" required placeholder="Ej: 3001234567">
                  </div>
                </div>
                <div class="col-sm-4 mt-2 mt-sm-0">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Email</span>
                    </div>
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="tu@correo.com">
                  </div>
                </div>
              </div>

              <!-- Ubicación -->
              <p class="section-title mt-3"><i class="fas fa-map-marker-alt mr-1"></i>Ubicación</p>
              <div class="form-row mb-3">
                <div class="col-sm-5">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Ciudad</span>
                    </div>
                    <input type="text" class="form-control" name="expedida" id="ciudad"
                      placeholder="Ej: Bogotá" required>
                  </div>
                </div>
                <div class="col-sm-7 mt-2 mt-sm-0">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Dirección</span>
                    </div>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                      placeholder="Ej: Cra 10 # 25-30">
                  </div>
                </div>
              </div>

              <!-- Fuente (oculta, pre-llenada) -->
              <div class="form-row mb-3">
                <div class="col-sm-5">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Fuente</span>
                    </div>
                    <input type="text" class="form-control" value="-Web-" readonly style="background:#f8f9fa; color:#6c757d;">
                    <input type="hidden" name="fuente_leads" value="web">
                  </div>
                </div>
              </div>

              <!-- Campos ocultos requeridos por la DB -->
              <input type="hidden" name="proceso_leads" value="1">

              <div id="div-error" class="alert alert-danger" style="display:none;"></div>

              <div id="div-enviando" class="text-center py-2">
                <span class="spinner-border spinner-border-sm text-primary mr-2"></span>Enviando postulación...
              </div>

              <div class="text-right mt-4">
                <button type="submit" class="btn btn-primary btn-lg" id="btn_enviar">
                  <i class="fas fa-paper-plane mr-2"></i>Enviar postulación
                </button>
              </div>

            </form>
          </div>
        </div>

        <div class="text-center">
          <small class="text-muted">Versión 1.7 &mdash; MotoTrabajo &amp; Motogou</small>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){

  $('#form_postulacion').on('submit', function(e){
    e.preventDefault();

    var tipo     = $('#tipo_documento').val();
    var nid      = $('#identificacion').val().trim();
    var nombres  = $('#nombres').val().trim();
    var apellidos= $('#apellidos').val().trim();
    var celular  = $('#celular').val().trim();
    var ciudad   = $('#ciudad').val().trim();

    if(!tipo || tipo === ''){
      mostrarError('Selecciona el tipo de documento.'); return;
    }
    if(!nid){
      mostrarError('Ingresa el número de documento.'); return;
    }
    if(!nombres){
      mostrarError('Ingresa los nombres.'); return;
    }
    if(!apellidos){
      mostrarError('Ingresa los apellidos.'); return;
    }
    if(!celular){
      mostrarError('Ingresa el número de celular.'); return;
    }
    if(!ciudad){
      mostrarError('Ingresa la ciudad.'); return;
    }

    $('#div-error').hide();
    $('#btn_enviar').prop('disabled', true);
    $('#div-enviando').show();

    var formData = new FormData(document.getElementById('form_postulacion'));
    formData.append('tabla', 'leads_clientes');
    formData.append('tipoconsulta', 'insert');

    $.ajax({
      url: 'ajax/registro_postulacion.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function(res){
        $('#div-enviando').hide();
        if(res.resultado == 1){
          $('#div-formulario').hide();
          $('#div-exito').show();
        } else {
          mostrarError(res.mensaje || 'Error al enviar. Intenta nuevamente.');
          $('#btn_enviar').prop('disabled', false);
        }
      },
      error: function(){
        $('#div-enviando').hide();
        mostrarError('Error de conexión. Intenta nuevamente.');
        $('#btn_enviar').prop('disabled', false);
      }
    });
  });

  function mostrarError(msg){
    $('#div-error').text(msg).show();
    $('html, body').animate({ scrollTop: $('#div-error').offset().top - 20 }, 300);
  }

});

function reiniciar(){
  document.getElementById('form_postulacion').reset();
  $('#div-exito').hide();
  $('#div-formulario').show();
  $('#btn_enviar').prop('disabled', false);
}
</script>
</body>
</html>
