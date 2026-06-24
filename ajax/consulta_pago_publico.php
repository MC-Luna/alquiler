<?php
require(dirname(__DIR__)."/conexion/conexion.php");
$con = new conexion_db();

$identificacion = trim($_POST['identificacion'] ?? '');

if(empty($identificacion)){
    echo json_encode(['resultado' => 0, 'mensaje' => 'Ingrese su número de documento.']);
    exit();
}

// Buscar cliente
$id_safe = $con->ejecutar_sql("SELECT codigo_cliente, nombres, apellidos, identificacion FROM tbl_clientes WHERE identificacion='$identificacion' AND codigo_estado != 0 LIMIT 1");

if($id_safe->num_rows == 0){
    echo json_encode(['resultado' => 0, 'mensaje' => 'No se encontró ningún cliente con ese documento.']);
    exit();
}

$cliente = $id_safe->fetch_assoc();
$codigo_cliente = $cliente['codigo_cliente'];

// Contratos activos con moto y pagos pendientes
$sql = "SELECT
    c.codigo_contrato,
    c.valor_pagar,
    c.fecha_proximo_cobro,
    c.mora,
    c.pendiente_pago,
    c.congelado,
    m.placa,
    m.marca,
    m.linea,
    m.modelo,
    m.color,
    COALESCE(cp.codigo_contrato_pago, 0) AS codigo_contrato_pago,
    COALESCE(cp.valor, c.valor_pagar) AS valor_cuota,
    COALESCE(cp.pago_realizado, 0) AS pago_realizado,
    COALESCE(cp.validado, 0) AS validado
FROM tbl_contratos c
INNER JOIN tbl_motos m ON m.codigo_moto = c.codigo_moto
LEFT JOIN tbl_contrato_pagos cp ON cp.codigo_contrato = c.codigo_contrato AND cp.validado IS NULL
WHERE c.codigo_cliente = $codigo_cliente AND c.activo = 1
ORDER BY c.fecha_proximo_cobro ASC";

$res = $con->ejecutar_sql($sql);
$contratos = $res->fetch_all(MYSQLI_ASSOC);

echo json_encode([
    'resultado' => 1,
    'cliente'   => $cliente,
    'contratos' => $contratos
]);
