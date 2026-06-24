<?php
require(dirname(__DIR__)."/conexion/conexion.php");
$con = new conexion_db();

$codigo_contrato = intval($_POST['codigo_contrato'] ?? 0);
$referencia      = trim($_POST['referencia'] ?? '');

if(!$codigo_contrato || empty($_FILES['soporte']['name'])){
    $msg = 'Datos incompletos.';
    if(!empty($_FILES['soporte']['error']) && $_FILES['soporte']['error'] == UPLOAD_ERR_INI_SIZE){
        $msg = 'El archivo supera el límite permitido por el servidor (12MB).';
    } elseif(empty($_POST)){
        $msg = 'El archivo es demasiado grande. Máximo 12MB.';
    }
    echo json_encode(['resultado' => 0, 'mensaje' => $msg]);
    exit();
}

$archivo = $_FILES['soporte'];

if($archivo['error'] !== UPLOAD_ERR_OK){
    $errores = [
        UPLOAD_ERR_INI_SIZE  => 'El archivo supera el límite del servidor (12MB).',
        UPLOAD_ERR_FORM_SIZE => 'El archivo supera el límite del formulario.',
        UPLOAD_ERR_PARTIAL   => 'El archivo se subió parcialmente.',
        UPLOAD_ERR_NO_FILE   => 'No se seleccionó ningún archivo.',
        UPLOAD_ERR_NO_TMP_DIR => 'Falta la carpeta temporal del servidor.',
        UPLOAD_ERR_CANT_WRITE => 'No se pudo escribir el archivo en el servidor.',
    ];
    $msg = $errores[$archivo['error']] ?? 'Error al subir el archivo (código '.$archivo['error'].')';
    echo json_encode(['resultado' => 0, 'mensaje' => $msg]);
    exit();
}

$extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
$permitidos = ['jpg','jpeg','png','pdf','heic','webp'];

if(!in_array($extension, $permitidos)){
    echo json_encode(['resultado' => 0, 'mensaje' => 'Formato no permitido. Use JPG, PNG o PDF.']);
    exit();
}

if($archivo['size'] > 10 * 1024 * 1024){
    echo json_encode(['resultado' => 0, 'mensaje' => 'El archivo supera 10MB.']);
    exit();
}

// Ruta de almacenamiento
$carpeta = dirname(__DIR__) . '/archivos_cargados/registro_pago/';
if(!file_exists($carpeta)) mkdir($carpeta, 0777, true);

$nombre_archivo = $codigo_contrato . date('YmdHis') . rand(1000,9999) . '.' . $extension;
$ruta_destino   = $carpeta . $nombre_archivo;

if(!move_uploaded_file($archivo['tmp_name'], $ruta_destino)){
    echo json_encode(['resultado' => 0, 'mensaje' => 'Error al guardar el archivo.']);
    exit();
}

// Buscar si ya existe un pago pendiente (validado IS NULL) para este contrato
$res_pago = $con->ejecutar_sql("SELECT codigo_contrato_pago FROM tbl_contrato_pagos WHERE codigo_contrato=$codigo_contrato AND validado IS NULL ORDER BY fecha_registro DESC LIMIT 1");

if($res_pago->num_rows > 0){
    // Actualizar el registro existente: nuevo archivo. numero_soporte queda NULL (lo llena el admin al validar)
    $pago = $res_pago->fetch_assoc();
    $con->ejecutar_sql("UPDATE tbl_contrato_pagos SET archivo='$nombre_archivo', observaciones='Ref cliente: $referencia', numero_soporte=NULL, validado=NULL WHERE codigo_contrato_pago=" . $pago['codigo_contrato_pago']);
    $codigo_pago = $pago['codigo_contrato_pago'];
} else {
    // Crear nuevo registro — numero_soporte=NULL para que el admin lo valide. Referencia del cliente en observaciones.
    $con->ejecutar_sql("INSERT INTO tbl_contrato_pagos (codigo_contrato, archivo, numero_soporte, observaciones, validado, valor, pago_realizado) VALUES ($codigo_contrato, '$nombre_archivo', NULL, 'Ref cliente: $referencia', NULL, 0, 0)");
    $codigo_pago = $con->ejecutar_sql("SELECT LAST_INSERT_ID() as id")->fetch_assoc()['id'];
}

// Registrar en tbl_conf_docs (categoria 10 = Registro de Pagos)
// Actualizar si ya existe un doc para este pago, sino insertar
$doc_existente = $con->ejecutar_sql("SELECT codigo_documento FROM tbl_conf_docs WHERE tipo_documento=1 AND codigo_padre=$codigo_pago LIMIT 1");
if($doc_existente->num_rows > 0){
    $doc = $doc_existente->fetch_assoc();
    $con->actualizar('tbl_conf_docs', "nombre='$nombre_archivo', tipo='$extension'", "codigo_documento=" . $doc['codigo_documento']);
} else {
    $campos_doc = [
        'codigo_tipo_padre' => 10,
        'tipo_documento'    => 1,
        'codigo_padre'      => $codigo_pago,
        'nombre'            => $nombre_archivo,
        'tipo'              => $extension
    ];
    $con->insertar('tbl_conf_docs', $campos_doc);
}

echo json_encode([
    'resultado' => 1,
    'mensaje'   => 'Soporte de pago enviado correctamente. El equipo lo revisará pronto.',
    'codigo_pago' => $codigo_pago
]);
