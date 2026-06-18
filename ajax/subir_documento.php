<?php

require(dirname(__DIR__)."/conexion/conexion.php");
require(dirname(__DIR__)."/php/upload.php");

$conexion=new conexion_db();

//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//echo "</pre>";

$categoria=$_POST["categoria"];
$tipo_documentos=$_POST["tipo_documento"];
$codigo_padre=$_POST["codigo_padre"];

$i=0;
foreach ($_FILES as $file) {
    if ( $file["name"] != "") {

    echo  registrar_documento($categoria,$tipo_documentos,$codigo_padre,$file);       
    } 
  $i++;
}

?>