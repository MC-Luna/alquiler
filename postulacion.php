<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Postulación - MotoApp</title>
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
      color: #007bff;
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 0.4rem;
      margin-top: 1.25rem;
      margin-bottom: 1rem;
    }
    .form-label {
      font-size: 0.82rem;
      font-weight: 600;
      color: #495057;
      margin-bottom: 0.3rem;
    }
    .required-mark { color: #dc3545; }
    #div-exito { display: none; }
    #div-enviando { display: none; }
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
            <p class="text-muted small mb-0">Completa tus datos para iniciar el proceso de vinculación con MotoApp. Los campos con <span style="color:#dc3545;">*</span> son obligatorios.</p>

            <form id="form_postulacion" novalidate>

              <!-- Identificación -->
              <p class="section-title"><i class="fas fa-id-card mr-1"></i>Identificación</p>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label class="form-label" for="tipo_documento">Tipo de documento <span class="required-mark">*</span></label>
                  <select class="form-control" name="tipo_documento" id="tipo_documento" required>
                    <option value="">Seleccione...</option>
                    <option value="cc">Cédula de Ciudadanía</option>
                    <option value="ex">Cédula de Extranjería</option>
                    <option value="pa">Pasaporte</option>
                    <option value="nit">NIT</option>
                  </select>
                </div>
                <div class="form-group col-md-7">
                  <label class="form-label" for="identificacion">Número de documento <span class="required-mark">*</span></label>
                  <input type="text" class="form-control" name="identificacion" id="identificacion"
                    placeholder="Ej: 1023456789" required>
                </div>
              </div>

              <!-- Datos personales -->
              <p class="section-title"><i class="fas fa-user mr-1"></i>Datos personales</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="nombres">Nombres <span class="required-mark">*</span></label>
                  <input type="text" class="form-control" name="nombres" id="nombres"
                    placeholder="Ej: Juan Carlos" required>
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="apellidos">Apellidos <span class="required-mark">*</span></label>
                  <input type="text" class="form-control" name="apellidos" id="apellidos"
                    placeholder="Ej: Gómez López" required>
                </div>
              </div>

              <!-- Contacto -->
              <p class="section-title"><i class="fas fa-phone mr-1"></i>Contacto</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="celular">Celular <span class="required-mark">*</span></label>
                  <input type="tel" class="form-control" name="celular" id="celular"
                    placeholder="Ej: 3001234567" required>
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="correo">Correo electrónico</label>
                  <input type="email" class="form-control" name="correo" id="correo"
                    placeholder="tu@correo.com">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="form-label" for="telefono">Teléfono fijo <span class="text-muted" style="font-weight:400;">(opcional)</span></label>
                  <input type="tel" class="form-control" name="telefono" id="telefono"
                    placeholder="Ej: 6012345678">
                </div>
              </div>

              <!-- Ubicación -->
              <p class="section-title"><i class="fas fa-map-marker-alt mr-1"></i>Ubicación</p>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label class="form-label" for="ciudades_leads">Ciudad <span class="required-mark">*</span></label>
                  <select class="form-control" name="expedida" id="ciudades_leads" required>
                    <option value="">Cargando...</option>
                  </select>
                </div>
                <div class="form-group col-md-7">
                  <label class="form-label" for="direccion">Dirección de residencia</label>
                  <input type="text" class="form-control" name="direccion" id="direccion"
                    placeholder="Ej: Cra 10 # 25-30">
                </div>
              </div>

              <!-- Fuente oculta -->
              <input type="hidden" name="fuente_leads" value="web">

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
          <small class="text-muted">Versión 1.7 &mdash; MotoApp</small>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="js/mototrabajo.js"></script>
<script>
$(document).ready(function(){

  rellenar_select("tbl_ciudades","nombre","concat(codigo_pais,' > ', nombre)","codigo_pais='COL'","ciudades_leads");

  $('#form_postulacion').on('submit', function(e){
    e.preventDefault();

    var tipo     = $('#tipo_documento').val();
    var nid      = $('#identificacion').val().trim();
    var nombres  = $('#nombres').val().trim();
    var apellidos= $('#apellidos').val().trim();
    var celular  = $('#celular').val().trim();
    var ciudad   = $('#ciudades_leads').val();

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
    if(!ciudad || ciudad === '0'){
      mostrarError('Selecciona la ciudad.'); return;
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
