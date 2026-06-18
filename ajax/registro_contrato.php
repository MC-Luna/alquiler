<?php
// CONEXION
$servername = "localhost";
$username = "s19ff36e_ukairos";
$password = "Kairos2026#";
$basedate="s19ff36e_kairos";
$conn = new mysqli($servername, $username, $password, $basedate);
set_time_limit(0);

require(dirname(__DIR__)."/conexion/conexion.php");
require(dirname(__DIR__)."/php/upload.php");

$conexion=new conexion_db();

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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

$url="https://pdf.mototrabajo.com/?t=";

switch ($_POST["codigo_tipo_contrato"]) {
  case "1":
    $url.="alquiler";
    break;
  case "2":
    $url.="alquileroc";
    break;
  case "3":
    $url.="turismo";
    break;
  case "4":
      $url.="corporativo";
    break;
}


if(!$result= $conn->query($sql)){
  
    die('Ha ocurrido un error en la consult de datos [' . $conn->error . '] / '.$sql);
    error_log($sql, 1,"jorgemario.com@gmail.com");
}else{
    $codigo_contrato=$conn->insert_id;

    $i=0;
    foreach ($_FILES as $file) {
        if ( $file["name"] != "") {
          registrar_documento(5,6,$codigo_contrato,$file);       
        } 
      $i++;
    }

    echo "Se realizó registro del contrato nro ". $codigo_contrato. "</br> Puede generar el contrato haciendo click <a href='".$url."&id=".$codigo_contrato."' target='_blank'>aquí</a> ";

}
        

?>