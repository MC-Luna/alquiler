<?php
session_start();
require(dirname(__DIR__)."/conexion/conexion.php");
$db=new conexion_db();

$codigo_documento=$_POST["codigo_documento"];
$codigo_usuario=$_SESSION["codigo_usuario"];

$sql="INSERT INTO tbl_conf_docs_eliminados (codigo_documento, codigo_tipo_padre, tipo_documento, codigo_padre, nombre, tipo, fecha_sistema, codigo_usuario)
SELECT codigo_documento, codigo_tipo_padre, tipo_documento, codigo_padre, nombre, tipo, fecha_sistema, ". $codigo_usuario ." FROM tbl_conf_docs WHERE codigo_documento=". $codigo_documento;

if($result= $db->ejecutar_sql($sql)){

  $sql="DELETE FROM tbl_conf_docs WHERE codigo_documento=". $codigo_documento;
  
  if($result= $db->ejecutar_sql($sql)){
    echo "Se ha eliminado el documento";
  }else{
    echo "Ha ocurrido un error al eliminar el documento, intentarlo otra vez";
  }
}else{
  echo "Ha ocurrido un error al eliminar log de documento eliminado, intentarlo otra vez";
}

$db->close();

?>