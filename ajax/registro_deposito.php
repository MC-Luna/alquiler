<?php
// CONEXION
$servername = "localhost";
$username = "s19ff36e_ukairos";
$password = "Kairos2026#";
$basedate="s19ff36e_kairos";
$conn = new mysqli($servername, $username, $password, $basedate);
set_time_limit(0);

require(dirname(__DIR__)."/conexion/conexion.php");
//require(dirname(__DIR__)."/php/upload.php");

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

$sql='INSERT INTO tbl_contrato_depositos(codigo_contrato,tipo,fecha,banco,referencia,codigo_usuario) ';
$sql.='VALUES ('.$_POST["codigo_contrato"].',"'.$_POST["tipo"].'","'.$_POST["fecha"].'",'.$_POST["banco"].',"'.$_POST["referencia"].'","'.$_POST["codigo_usuario"].')';

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

    /*
    $i=0;
    foreach ($_FILES as $file) {
        if ( $file["name"] != "") {
          registrar_documento(5,6,$codigo_contrato,$file);       
        } 
      $i++;
    }
    */
    echo "Se realizó registro del contrato nro ". $codigo_contrato. "</br> Puede generar el contrato haciendo click <a href='".$url."&id=".$codigo_contrato."' target='_blank'>aquí</a> ";

}
?>