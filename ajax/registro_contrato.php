<?php
set_time_limit(0);

require(dirname(__DIR__)."/conexion/conexion.php");
require(dirname(__DIR__)."/php/upload.php");

$conexion = new conexion_db();
$conn     = $conexion->getConnection();

// INSERTAR REGISTRO

if(empty($_POST["deposito"])){
  $_POST["deposito"]=0;
}

if(empty($_POST["extras"])){
  $_POST["extras"]=0;
}

if(empty($_POST["kim_inicial"])){
  $_POST["kim_inicial"]=0;
}

$sql='INSERT INTO tbl_contratos(codigo_tipo_contrato,fecha_inicio_contrato,fecha_final_contrato,fecha_proximo_cobro,frecuencia_cobro,valor_pagar,codigo_moto,codigo_cliente,deposito,extras,kim_inicial) ';
$sql.='VALUES ('.$_POST["codigo_tipo_contrato"].',"'.$_POST["fechainicio"].'","'.$_POST["fechafinal"].'","'.$_POST["proximocobro"].'","'.$_POST["frecuencia"].'","'.$_POST["valor"].'","'.$_POST["codigo_moto"].'","'.$_POST["codigo_cliente"].'",'.$_POST["deposito"].','.$_POST["extras"].','.$_POST["kim_inicial"].')';

if(!$result= $conn->query($sql)){
    die('Ha ocurrido un error al registrar el contrato: [' . $conn->error . ']');
}else{
    $codigo_contrato = $conn->insert_id;

    foreach ($_FILES as $file) {
        if($file["name"] != "") {
            registrar_documento(5, 6, $codigo_contrato, $file);
        }
    }

    $url_pdf = "/app/ajax/generar_contrato.php?id=" . $codigo_contrato;
    echo "Se realizó registro del contrato nro <strong>$codigo_contrato</strong>.<br><br>"
       . "<a href='$url_pdf' target='_blank' style='background:#1a1a2e;color:#fff;padding:8px 18px;border-radius:6px;text-decoration:none;'>🖨️ Ver e Imprimir Contrato</a>";
}
        

?>