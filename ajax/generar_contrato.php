<?php
require(dirname(__DIR__)."/conexion/conexion.php");

$id = intval($_GET['id'] ?? 0);
if(!$id){ http_response_code(400); die('ID de contrato requerido.'); }

$con = new conexion_db();

$r = $con->ejecutar_sql("
    SELECT
        c.codigo_contrato, c.codigo_tipo_contrato,
        c.fecha_inicio_contrato, c.fecha_final_contrato,
        c.fecha_proximo_cobro, c.frecuencia_cobro,
        c.valor_pagar, c.deposito, c.extras, c.kim_inicial,
        tc.descripcion AS tipo_contrato,
        cl.nombres, cl.apellidos, cl.identificacion, cl.telefono, cl.direccion,
        m.placa, m.marca, m.linea, m.modelo, m.color, m.cilindraje,
        s.nombre AS sede, s.telefono AS sede_telefono,
        ci.nombre AS ciudad
    FROM tbl_contratos c
    INNER JOIN tbl_clientes cl ON cl.codigo_cliente = c.codigo_cliente
    INNER JOIN tbl_motos m ON m.codigo_moto = c.codigo_moto
    LEFT JOIN tbl_contrato_tipos tc ON tc.codigo_tipo_contrato = c.codigo_tipo_contrato
    LEFT JOIN tbl_sedes s ON s.codigo_sede = m.codigo_sede
    LEFT JOIN tbl_ciudades ci ON ci.codigo_ciudad = s.codigo_ciudad
    WHERE c.codigo_contrato = $id
    LIMIT 1
");

if($r->num_rows === 0){ http_response_code(404); die('Contrato no encontrado.'); }
$c = $r->fetch_assoc();

// Formatear valores
function fmt_money($v){ return '$'.number_format((float)$v, 0, ',', '.'); }
function fmt_date($d){
    if(!$d || $d === '0000-00-00') return '—';
    [$y,$m,$da] = explode('-', $d);
    $meses = ['','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
    return intval($da).' de '.$meses[intval($m)].' de '.$y;
}

$frecuencia_texto = match(intval($c['frecuencia_cobro'])){
    1  => 'Diario',
    7  => 'Semanal (cada 7 días)',
    14 => 'Quincenal (cada 14 días)',
    15 => 'Quincenal (cada 15 días)',
    30 => 'Mensual (cada 30 días)',
    default => 'Cada '.$c['frecuencia_cobro'].' días'
};
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contrato #<?= $c['codigo_contrato'] ?> — <?= htmlspecialchars($c['nombres'].' '.$c['apellidos']) ?></title>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    font-size: 11pt;
    color: #222;
    background: #e8e8e8;
  }

  .page {
    width: 210mm;
    min-height: 297mm;
    margin: 20px auto;
    background: #fff;
    padding: 18mm 18mm 22mm;
    box-shadow: 0 4px 24px rgba(0,0,0,.18);
    position: relative;
  }

  /* ── Botón imprimir ── */
  .btn-print {
    position: fixed;
    bottom: 28px;
    right: 28px;
    background: #1a1a2e;
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: 14px 28px;
    font-size: 14px;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(0,0,0,.3);
    z-index: 999;
    transition: background .2s;
  }
  .btn-print:hover { background: #28a745; }

  /* ── Encabezado ── */
  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 3px solid #1a1a2e;
    padding-bottom: 12px;
    margin-bottom: 18px;
  }
  .header img { height: 52px; }
  .header-right { text-align: right; }
  .header-right .contrato-num {
    font-size: 20pt;
    font-weight: 700;
    color: #1a1a2e;
  }
  .header-right .contrato-tipo {
    font-size: 10pt;
    color: #555;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  /* ── Título central ── */
  .titulo {
    text-align: center;
    font-size: 14pt;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #1a1a2e;
    margin-bottom: 20px;
  }

  /* ── Secciones ── */
  .seccion {
    margin-bottom: 18px;
    border: 1px solid #dde;
    border-radius: 6px;
    overflow: hidden;
  }
  .seccion-titulo {
    background: #1a1a2e;
    color: #fff;
    font-size: 9pt;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 6px 12px;
  }
  .seccion-body { padding: 12px; }

  /* ── Grid de campos ── */
  .grid { display: grid; gap: 8px 16px; }
  .grid-2 { grid-template-columns: 1fr 1fr; }
  .grid-3 { grid-template-columns: 1fr 1fr 1fr; }
  .grid-4 { grid-template-columns: 1fr 1fr 1fr 1fr; }

  .campo label {
    display: block;
    font-size: 7.5pt;
    color: #666;
    text-transform: uppercase;
    letter-spacing: .5px;
    margin-bottom: 2px;
  }
  .campo span {
    display: block;
    font-size: 10.5pt;
    font-weight: 600;
    color: #111;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 3px;
    min-height: 20px;
  }

  /* ── Valores destacados ── */
  .valor-grande {
    font-size: 15pt !important;
    color: #1a1a2e !important;
  }

  /* ── Cláusulas ── */
  .clausulas {
    margin-bottom: 18px;
    font-size: 9pt;
    color: #444;
    line-height: 1.6;
  }
  .clausulas h4 {
    font-size: 9pt;
    font-weight: 700;
    text-transform: uppercase;
    color: #1a1a2e;
    margin: 10px 0 4px;
    border-bottom: 1px solid #dde;
    padding-bottom: 2px;
  }
  .clausulas p { margin-bottom: 4px; }

  /* ── Firmas ── */
  .firmas {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    margin-top: 30px;
  }
  .firma { text-align: center; }
  .firma .linea {
    border-top: 1.5px solid #222;
    margin-bottom: 4px;
    margin-top: 48px;
  }
  .firma .nombre { font-weight: 700; font-size: 10pt; }
  .firma .rol { font-size: 8pt; color: #666; }

  /* ── Pie de página ── */
  .footer {
    margin-top: 24px;
    border-top: 1.5px solid #1a1a2e;
    padding-top: 8px;
    font-size: 7.5pt;
    color: #888;
    text-align: center;
  }

  /* ── IMPRESIÓN ── */
  @media print {
    body { background: #fff !important; }
    .page { margin: 0; box-shadow: none; width: 100%; padding: 12mm 16mm 16mm; }
    .btn-print { display: none !important; }
    @page { size: A4; margin: 0; }
  }
</style>
</head>
<body>

<button class="btn-print" onclick="window.print()">🖨️ Imprimir / Guardar PDF</button>

<div class="page">

  <!-- Encabezado -->
  <div class="header">
    <img src="/img/motoapp_logo_light.png" alt="MOTO/APP">
    <div class="header-right">
      <div class="contrato-num">Contrato #<?= $c['codigo_contrato'] ?></div>
      <div class="contrato-tipo">Contrato de <?= htmlspecialchars($c['tipo_contrato'] ?? 'Alquiler') ?></div>
      <?php if($c['sede']): ?>
      <div style="font-size:8.5pt;color:#666;margin-top:2px;"><?= htmlspecialchars($c['sede']) ?><?= $c['ciudad'] ? ' — '.$c['ciudad'] : '' ?></div>
      <?php endif; ?>
    </div>
  </div>

  <div class="titulo">Contrato de <?= htmlspecialchars($c['tipo_contrato'] ?? 'Alquiler') ?> de Motocicleta</div>

  <!-- Datos del cliente -->
  <div class="seccion">
    <div class="seccion-titulo">📋 Datos del Arrendatario</div>
    <div class="seccion-body">
      <div class="grid grid-2">
        <div class="campo">
          <label>Nombre completo</label>
          <span><?= htmlspecialchars($c['nombres'].' '.$c['apellidos']) ?></span>
        </div>
        <div class="campo">
          <label>Número de identificación</label>
          <span><?= htmlspecialchars($c['identificacion']) ?></span>
        </div>
        <div class="campo">
          <label>Teléfono</label>
          <span><?= htmlspecialchars($c['telefono'] ?? '—') ?></span>
        </div>
        <div class="campo">
          <label>Dirección</label>
          <span><?= htmlspecialchars($c['direccion'] ?? '—') ?></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Datos de la moto -->
  <div class="seccion">
    <div class="seccion-titulo">🏍️ Vehículo en Arriendo</div>
    <div class="seccion-body">
      <div class="grid grid-3">
        <div class="campo">
          <label>Placa</label>
          <span><?= htmlspecialchars($c['placa']) ?></span>
        </div>
        <div class="campo">
          <label>Marca / Línea</label>
          <span><?= htmlspecialchars($c['marca'].' '.$c['linea']) ?></span>
        </div>
        <div class="campo">
          <label>Modelo</label>
          <span><?= htmlspecialchars($c['modelo']) ?></span>
        </div>
        <div class="campo">
          <label>Color</label>
          <span><?= htmlspecialchars($c['color'] ?? '—') ?></span>
        </div>
        <div class="campo">
          <label>Cilindraje</label>
          <span><?= htmlspecialchars($c['cilindraje'] ?? '—') ?></span>
        </div>
        <div class="campo">
          <label>Kilometraje inicial</label>
          <span><?= $c['kim_inicial'] ? number_format($c['kim_inicial']).' km' : '—' ?></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Condiciones económicas -->
  <div class="seccion">
    <div class="seccion-titulo">💰 Condiciones del Contrato</div>
    <div class="seccion-body">
      <div class="grid grid-4">
        <div class="campo">
          <label>Fecha de inicio</label>
          <span><?= fmt_date($c['fecha_inicio_contrato']) ?></span>
        </div>
        <div class="campo">
          <label>Fecha de finalización</label>
          <span><?= fmt_date($c['fecha_final_contrato']) ?></span>
        </div>
        <div class="campo">
          <label>Primer cobro</label>
          <span><?= fmt_date($c['fecha_proximo_cobro']) ?></span>
        </div>
        <div class="campo">
          <label>Frecuencia de pago</label>
          <span><?= $frecuencia_texto ?></span>
        </div>
        <div class="campo">
          <label>Valor del canon</label>
          <span class="valor-grande"><?= fmt_money($c['valor_pagar']) ?></span>
        </div>
        <div class="campo">
          <label>Depósito de garantía</label>
          <span class="valor-grande"><?= fmt_money($c['deposito']) ?></span>
        </div>
        <div class="campo">
          <label>Extras</label>
          <span><?= fmt_money($c['extras']) ?></span>
        </div>
        <div class="campo">
          <label>Ciudad</label>
          <span><?= htmlspecialchars($c['ciudad'] ?? '—') ?></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Cláusulas -->
  <div class="clausulas">
    <h4>Cláusulas y Condiciones</h4>
    <p><strong>1. Uso del vehículo:</strong> El arrendatario se compromete a usar el vehículo exclusivamente para fines lícitos, dentro del territorio nacional, y a no subarrendar, prestar o ceder el vehículo a terceros sin autorización escrita del arrendador.</p>
    <p><strong>2. Mantenimiento:</strong> El arrendatario es responsable del mantenimiento preventivo básico (aceite, llantas, cadena). Los daños por uso inadecuado serán asumidos en su totalidad por el arrendatario.</p>
    <p><strong>3. Pago:</strong> El canon de arrendamiento de <?= fmt_money($c['valor_pagar']) ?> se pagará con una frecuencia <?= strtolower($frecuencia_texto) ?>. El retraso en el pago generará mora conforme a la ley.</p>
    <p><strong>4. Depósito:</strong> El depósito de garantía de <?= fmt_money($c['deposito']) ?> será devuelto al finalizar el contrato, descontando los daños, multas o deudas pendientes.</p>
    <p><strong>5. Devolución:</strong> Al vencimiento del contrato, el arrendatario devolverá el vehículo en las mismas condiciones en que lo recibió, salvo el desgaste normal por el uso.</p>
    <p><strong>6. Documentación:</strong> El arrendatario debe mantener vigentes licencia de conducción, SOAT y revisión técnico-mecánica. Las multas por infracción serán de responsabilidad exclusiva del arrendatario.</p>
  </div>

  <!-- Firmas -->
  <div class="firmas">
    <div class="firma">
      <div class="linea"></div>
      <div class="nombre"><?= htmlspecialchars($c['nombres'].' '.$c['apellidos']) ?></div>
      <div class="rol">Arrendatario — C.C. <?= htmlspecialchars($c['identificacion']) ?></div>
    </div>
    <div class="firma">
      <div class="linea"></div>
      <div class="nombre">Representante Legal</div>
      <div class="rol">Arrendador — <?= htmlspecialchars($c['sede'] ?? 'KAIROS') ?></div>
    </div>
  </div>

  <!-- Pie -->
  <div class="footer">
    Contrato #<?= $c['codigo_contrato'] ?> generado el <?= date('d/m/Y H:i') ?> — MOTO/APP · Platform · Velocidad · Confianza
  </div>

</div>
</body>
</html>
