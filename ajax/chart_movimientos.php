<?php
// Realiza la conexión a la base de datos y ejecuta la consulta
// Supongamos que la consulta devuelve un conjunto de resultados con dos columnas: 'etiqueta' y 'valor'
// Puedes ajustar este código según la estructura de tu base de datos y la consulta necesaria

// Realiza la conexión a la base de datos
$conexion = new mysqli('localhost', 's19ff36e_ukairos', 'Kairos2026#', 's19ff36e_kairos');

// Verifica la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if(empty($_GET['fecha_desde']) and !isset($_GET['codigo_cuenta'])){
    $filtro=' ';

}else{

    if(empty($_GET['fecha_desde']) and $_GET['codigo_cuenta']==0){
        $filtro=' ';
    }else{

        $filtro=' WHERE';
        $conector='';
    
        if(!empty($_GET['fecha_desde'])){
            $filtro.=" DATE_FORMAT(m.fecha_creacion, '%Y-%m-%d') BETWEEN '".$_GET['fecha_desde']."' AND '".$_GET['fecha_hasta']."'";
            $conector=' AND';
        }
    
        if(isset($_GET['codigo_cuenta'])){
            if($_GET['codigo_cuenta']>0){
                $filtro.= $conector." codigo_cuenta=".$_GET['codigo_cuenta'];
            }
    
        }

    }

}

$sql="SELECT 
DATE_FORMAT(m.fecha_creacion, '%d-%m-%y') fecha
,sum(if(m.valor>0,m.valor,0)) entrada
,abs(sum(if(m.valor<0,m.valor,0))) salida 
FROM tbl_movimientos m

". $filtro." 

GROUP BY DATE_FORMAT(m.fecha_creacion, '%d-%m-%y')

order by m.fecha_creacion";

//,sum(if(m.valor<0,m.valor,0)) salida 


// Ejecuta la consulta
$resultado = $conexion->query($sql);

// Prepara los datos en un formato adecuado para Chart.js

$data = array();
while ($fila = $resultado->fetch_assoc()) {
    $data['fecha'][] = $fila['fecha'];
    $data['entrada'][] = $fila['entrada'];
    $data['salida'][] = $fila['salida'];
}

// Convierte los datos a formato JSON y envíalos de vuelta
echo json_encode($data);

// Cierra la conexión
$conexion->close();

?>
