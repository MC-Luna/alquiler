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

// INSERTAR REGISTRO
$sql="SELECT
		format(SUM(m.valor),0) caja_menor
		FROM tbl_movimientos m
		
		INNER JOIN tbl_movimiento_cuentas mc ON 
		mc.codigo_cuenta = m.codigo_cuenta";

if(empty($_POST["codigo_sede_filtro"])){
  $sql.="";
}else{
  $sql.=" where mc.codigo_tipo_cuenta= 3 AND mc.codigo_sede=". $_POST["codigo_sede_filtro"];
}

if(!$result= $conn->query($sql)){
    die('Ha ocurrido un error en la consulta de datos [' . $conn->error . '] / '.$sql);
    
}else{

  $row=mysqli_fetch_array($result);
  $row=$row['caja_menor'];
  echo $row;

}
        
?>