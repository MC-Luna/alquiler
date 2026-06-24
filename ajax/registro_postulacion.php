<?php
header('Content-Type: application/json');

require(dirname(__DIR__)."/conexion/conexion.php");

$conexion = new conexion_db();

$campos_permitidos = [
    'tipo_documento', 'identificacion', 'nombres', 'apellidos',
    'telefono', 'celular', 'correo', 'expedida', 'direccion',
    'proceso_leads'
];

$datos = [];
foreach ($campos_permitidos as $campo) {
    $datos[$campo] = isset($_POST[$campo]) ? trim($_POST[$campo]) : '';
}

// Validaciones mínimas
if (empty($datos['tipo_documento']) || $datos['tipo_documento'] === '0') {
    echo json_encode(['resultado' => 0, 'mensaje' => 'El tipo de documento es requerido.']);
    exit;
}
if (empty($datos['identificacion'])) {
    echo json_encode(['resultado' => 0, 'mensaje' => 'El número de documento es requerido.']);
    exit;
}
if (empty($datos['nombres'])) {
    echo json_encode(['resultado' => 0, 'mensaje' => 'Los nombres son requeridos.']);
    exit;
}
if (empty($datos['apellidos'])) {
    echo json_encode(['resultado' => 0, 'mensaje' => 'Los apellidos son requeridos.']);
    exit;
}
if (empty($datos['celular'])) {
    echo json_encode(['resultado' => 0, 'mensaje' => 'El celular es requerido.']);
    exit;
}
if (empty($datos['expedida'])) {
    echo json_encode(['resultado' => 0, 'mensaje' => 'La ciudad es requerida.']);
    exit;
}

// Valores por defecto para campos NOT NULL de tbl_clientes
$datos['codigo_estado']       = 2;
$datos['origen_lead']         = 1;
$datos['codigo_origen_lead']  = 0;
$datos['proceso_leads']       = 1;

$fuente = isset($_POST['fuente_leads']) ? trim($_POST['fuente_leads']) : 'web';

$codigo_cliente = $conexion->insertar('tbl_clientes', $datos);

if (!$codigo_cliente) {
    echo json_encode(['resultado' => 0, 'mensaje' => 'Error al registrar los datos. Intenta nuevamente.']);
    exit;
}

$lead = [
    'codigo_cliente' => $codigo_cliente,
    'fuente'         => $fuente,
    'fase'           => 1,
    'FECHAINGRESO'   => date('Y-m-d')
];

$res = $conexion->insertar('leads_clientes', $lead);

if ($res) {
    echo json_encode(['resultado' => 1, 'mensaje' => 'Postulación registrada correctamente.']);
} else {
    echo json_encode(['resultado' => 0, 'mensaje' => 'Error al registrar en leads. Intenta nuevamente.']);
}
?>
