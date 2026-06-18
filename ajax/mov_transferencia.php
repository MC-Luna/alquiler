<?php
// CONEXION
$servername = "localhost";
$username = "s19ff36e_ukairos";
$password = "Kairos2026#";
$basedate="s19ff36e_kairos";
$conn = new mysqli($servername, $username, $password, $basedate);
set_time_limit(0);

require(dirname(__DIR__)."/conexion/conexion.php");
$conexion=new conexion_db();

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$cuenta_origen=$_POST['cuenta_origen'];
$cuenta_destino=$_POST['cuenta_destino'];
$origen=$_POST['origen'];
$destino=$_POST['destino'];
$referencia=$_POST['referencia_transferencia'];
$usuario=$_POST['codigo_usuario_transferencia'];

// TRANSFERENCIA DE SALIDA
$valor=abs($_POST['valor_transferencia']);
$valor_salida="-$valor";
$observacion1= "Consignación a: $destino";

// TRANSFERENCIA DE ENTRADA
$observacion_2="Consignación a: $origen";

// INSERTAR REGISTRO
$sql="INSERT INTO tbl_movimientos (codigo_cuenta,codigo_origen,referencia,observaciones,valor,codigo_usuario,codigo_proveedor,codigo_concepto)
VALUES ($cuenta_origen, 10,'$referencia','$destino',$valor_salida,$usuario,1,17),
       ($cuenta_destino,10,'$referencia','$origen',$valor,$usuario,1,17);";

if(!$result= $conn->query($sql)){
    die('Ha ocurrido un error en la consulta de datos [' . $conn->error . '] / '.$sql);
    
}else{

  echo "Transferencia No. $conn->insert_id";

}
        
?>