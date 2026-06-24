<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Consulta de Pagos</title>
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
    .card-contrato {
      border-left: 5px solid #28a745;
      transition: box-shadow .2s;
    }
    .card-contrato:hover { box-shadow: 0 4px 15px rgba(0,0,0,.1); }
    .card-contrato.vencido { border-left-color: #dc3545; }
    .badge-estado { font-size: .85em; }
    .moto-icon { font-size: 2rem; color: #6c757d; }
    #div-resultados { display: none; }
    #div-cargando { display: none; }
    .upload-area {
      border: 2px dashed #ced4da;
      border-radius: 8px;
      padding: 20px;
      text-align: center;
      cursor: pointer;
      background: #fafafa;
      transition: border-color .2s;
    }
    .upload-area:hover { border-color: #007bff; background: #f0f7ff; }
    .upload-area.dragover { border-color: #007bff; background: #e8f4ff; }
    .saldo-cero { color: #28a745; font-weight: bold; }
    .saldo-pendiente { color: #dc3545; font-weight: bold; }
  </style>
</head>
<body>

<div class="header-brand">
  <img src="img/motoapp_logo_light.png" alt="Logo">
</div>

<div class="container mt-4 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <h5 class="card-title mb-1"><i class="fas fa-search mr-2 text-primary"></i>Consultar mis pagos</h5>
          <p class="text-muted small mb-3">Ingresa tu número de documento para ver tus contratos y subir tu comprobante de pago.</p>
          <div class="input-group">
            <input type="text" id="input_identificacion" class="form-control form-control-lg"
              placeholder="Ej: 1234567890" maxlength="20">
            <div class="input-group-append">
              <button class="btn btn-primary btn-lg" id="btn_consultar">
                <i class="fas fa-search"></i> Consultar
              </button>
            </div>
          </div>
          <div id="div-error" class="alert alert-danger mt-3" style="display:none;"></div>
        </div>
      </div>

      <div id="div-cargando" class="text-center py-4">
        <div class="spinner-border text-primary" role="status"></div>
        <p class="mt-2 text-muted">Consultando información...</p>
      </div>

      <div id="div-resultados">
        <div class="alert alert-info mb-3" id="div-bienvenida"></div>
        <div id="div-contratos"></div>
      </div>

    </div>
  </div>
</div>

<!-- Modal subir soporte -->
<div class="modal fade" id="modalSoporte" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-upload mr-2"></i>Subir comprobante de pago</h5>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="modal_codigo_contrato">
        <div class="form-group">
          <label>Número de referencia / soporte <span class="text-danger">*</span></label>
          <input type="text" id="modal_referencia" class="form-control" placeholder="Ej: REF-2024-001">
        </div>
        <div class="form-group">
          <label>Archivo de comprobante <span class="text-danger">*</span></label>
          <div class="upload-area" id="upload-area" onclick="document.getElementById('modal_archivo').click()">
            <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
            <p class="mb-0 text-muted">Haz clic o arrastra tu archivo aquí</p>
            <small class="text-muted">JPG, PNG, PDF — máximo 10MB</small>
          </div>
          <input type="file" id="modal_archivo" accept=".jpg,.jpeg,.png,.pdf,.heic,.webp" style="display:none">
          <div id="archivo-seleccionado" class="mt-2 text-success" style="display:none;">
            <i class="fas fa-check-circle mr-1"></i><span id="nombre-archivo"></span>
          </div>
        </div>
        <div id="modal-error" class="alert alert-danger" style="display:none;"></div>
        <div id="modal-exito" class="alert alert-success" style="display:none;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_subir">
          <i class="fas fa-paper-plane mr-1"></i>Enviar comprobante
        </button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){

  $('#btn_consultar').on('click', consultar);
  $('#input_identificacion').on('keypress', function(e){ if(e.which==13) consultar(); });

  function consultar(){
    var id = $('#input_identificacion').val().trim();
    if(!id){ mostrarError('Ingresa tu número de documento.'); return; }

    $('#div-error').hide();
    $('#div-resultados').hide();
    $('#div-cargando').show();

    $.ajax({
      type: 'POST',
      url: 'ajax/consulta_pago_publico.php',
      data: { identificacion: id },
      dataType: 'json',
      success: function(data){
        $('#div-cargando').hide();
        if(data.resultado == 0){
          mostrarError(data.mensaje);
        } else {
          renderResultados(data);
        }
      },
      error: function(){
        $('#div-cargando').hide();
        mostrarError('Error de conexión. Intenta nuevamente.');
      }
    });
  }

  function renderResultados(data){
    var c = data.cliente;
    $('#div-bienvenida').html(
      '<i class="fas fa-user-check mr-2"></i>Hola <strong>' + c.nombres + ' ' + c.apellidos + '</strong> — Documento: ' + c.identificacion
    );

    var html = '';
    if(data.contratos.length == 0){
      html = '<div class="alert alert-success"><i class="fas fa-check-circle mr-2"></i>No tienes contratos activos con pagos pendientes.</div>';
    } else {
      $.each(data.contratos, function(i, ct){
        var saldo = parseFloat(ct.valor_cuota) - parseFloat(ct.pago_realizado);
        var vencido = new Date(ct.fecha_proximo_cobro) < new Date();
        var congelado = parseInt(ct.congelado) > 0;

        var estadoBadge = congelado
          ? '<span class="badge badge-info badge-estado">Congelado</span>'
          : (vencido ? '<span class="badge badge-danger badge-estado">Vencido</span>'
                     : '<span class="badge badge-success badge-estado">Al día</span>');

        var saldoHtml = saldo <= 0
          ? '<span class="saldo-cero"><i class="fas fa-check-circle mr-1"></i>Al día</span>'
          : '<span class="saldo-pendiente"><i class="fas fa-exclamation-circle mr-1"></i>$' + formatNum(saldo) + '</span>';

        var btnUpload = ct.archivo
          ? '<span class="badge badge-warning p-2"><i class="fas fa-clock mr-1"></i>Comprobante en revisión</span>'
          : '<button class="btn btn-primary btn-sm btn-subir" data-contrato="'+ct.codigo_contrato+'"><i class="fas fa-upload mr-1"></i>Subir comprobante</button>';

        html += '<div class="card card-contrato mb-3 ' + (vencido && !congelado ? 'vencido' : '') + '">';
        html += '<div class="card-body">';
        html += '<div class="row align-items-center">';
        html += '<div class="col-auto"><i class="fas fa-motorcycle moto-icon"></i></div>';
        html += '<div class="col">';
        html += '<h6 class="mb-1"><strong>' + ct.marca + ' ' + ct.linea + ' ' + ct.modelo + '</strong> — Placa: <code>' + ct.placa + '</code> ' + estadoBadge + '</h6>';
        html += '<div class="row mt-2">';
        html += '<div class="col-sm-4"><small class="text-muted">Contrato</small><br><strong>#' + ct.codigo_contrato + '</strong></div>';
        html += '<div class="col-sm-4"><small class="text-muted">Próximo cobro</small><br><strong>' + ct.fecha_proximo_cobro + '</strong></div>';
        html += '<div class="col-sm-4"><small class="text-muted">Saldo pendiente</small><br>' + saldoHtml + '</div>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-auto mt-2 mt-sm-0">' + btnUpload + '</div>';
        html += '</div>';
        html += '</div></div>';
      });
    }

    $('#div-contratos').html(html);
    $('#div-resultados').show();
  }

  // Abrir modal de subida
  $(document).on('click', '.btn-subir', function(){
    var contrato = $(this).data('contrato');
    $('#modal_codigo_contrato').val(contrato);
    $('#modal_referencia').val('');
    $('#modal_archivo').val('');
    $('#archivo-seleccionado').hide();
    $('#modal-error').hide();
    $('#modal-exito').hide();
    $('#btn_subir').prop('disabled', false).html('<i class="fas fa-paper-plane mr-1"></i>Enviar comprobante');
    $('#modalSoporte').modal('show');
  });

  // Preview archivo seleccionado
  $('#modal_archivo').on('change', function(){
    if(this.files.length > 0){
      $('#nombre-archivo').text(this.files[0].name);
      $('#archivo-seleccionado').show();
    }
  });

  // Drag & drop
  var uploadArea = document.getElementById('upload-area');
  uploadArea.addEventListener('dragover', function(e){ e.preventDefault(); this.classList.add('dragover'); });
  uploadArea.addEventListener('dragleave', function(){ this.classList.remove('dragover'); });
  uploadArea.addEventListener('drop', function(e){
    e.preventDefault();
    this.classList.remove('dragover');
    if(e.dataTransfer.files.length > 0){
      document.getElementById('modal_archivo').files = e.dataTransfer.files;
      $('#nombre-archivo').text(e.dataTransfer.files[0].name);
      $('#archivo-seleccionado').show();
    }
  });

  // Enviar comprobante
  $('#btn_subir').on('click', function(){
    var contrato  = $('#modal_codigo_contrato').val();
    var referencia = $('#modal_referencia').val().trim();
    var archivo   = $('#modal_archivo')[0].files[0];

    $('#modal-error').hide();

    if(!referencia){ $('#modal-error').text('Ingresa el número de referencia.').show(); return; }
    if(!archivo){ $('#modal-error').text('Selecciona un archivo.').show(); return; }

    var formData = new FormData();
    formData.append('codigo_contrato', contrato);
    formData.append('referencia', referencia);
    formData.append('soporte', archivo);

    $('#btn_subir').prop('disabled', true).html('<span class="spinner-border spinner-border-sm mr-1"></span>Enviando...');

    $.ajax({
      url: 'ajax/subir_soporte_pago_publico.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function(res){
        if(res.resultado == 1){
          $('#modal-exito').text(res.mensaje).show();
          $('#btn_subir').hide();
          // Actualizar botón en la tarjeta
          $('.btn-subir[data-contrato="'+contrato+'"]').replaceWith(
            '<span class="badge badge-warning p-2"><i class="fas fa-clock mr-1"></i>Comprobante en revisión</span>'
          );
        } else {
          $('#modal-error').text(res.mensaje).show();
          $('#btn_subir').prop('disabled', false).html('<i class="fas fa-paper-plane mr-1"></i>Enviar comprobante');
        }
      },
      error: function(){
        $('#modal-error').text('Error de conexión. Intenta nuevamente.').show();
        $('#btn_subir').prop('disabled', false).html('<i class="fas fa-paper-plane mr-1"></i>Enviar comprobante');
      }
    });
  });

  function mostrarError(msg){ $('#div-error').text(msg).show(); }
  function formatNum(n){ return Number(n).toLocaleString('es-CO'); }

});
</script>
</body>
</html>
