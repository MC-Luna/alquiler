<?php

    // CONEXION CON BASE DE DATOS
    $mysql_host="localhost";
    $mysql_database="s19ff36e_kairos";
    $mysql_user="s19ff36e_ukairos";
    $mysql_password="Kairos2026#";

    $db = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
    
    if($db->connect_errno > 0){
        die('Error en la conexion de base de datos [' . $db->connect_error . ']');
    }

    $sql="SET time_zone = '-5:00'";
    if(!$result= $db->query($sql)){
        die('Error en consulta de time zone [' . $db->error . ']');
    }
    
    // ESTABLECER HUSO HORARIO EN COLOMBIA
    date_default_timezone_set('America/Bogota');
    $numero=date('Gi');

    // CONSULTA PAR BUSQUEDA DE MOTORES SEGUN LA FECHA ACTUAL
    //$sql='SELECT * FROM tbl_servicios s WHERE s.fecha_proximo="2024-08-14"';
    
    $sql='SELECT * FROM tbl_servicios s WHERE CURDATE()=DATE_SUB(s.fecha_proximo, INTERVAL 0 DAY)'; 

    if(!$result=$db->query($sql)){ die('Error [' . $db->error . ']');}

    echo "Esta es la hora: ". $numero;

    while($motor = $result->fetch_array(MYSQLI_NUM)){
        $values="";
        $coma="";

        $mensaje.="entro aquí";
        echo "aqui llego";
          
        $codigo_id=$motor[0];
        $referencia=$motor[1];
        $proveedor=$motor[2];
        $valor=$motor[3];
        $proxima_fecha=$motor[4];
        $frecuencia=$motor[5];
        $observaciones= $motor[9];
        $codigo_sede=$motor[7];
        
        $values.= $coma."(".$proveedor.",4,".$codigo_id.",'".$referencia."','".$observaciones."',".$codigo_sede.",1)"; 
        $coma=",";

        $sql_factura="INSERT INTO tbl_movimientos (codigo_proveedor,codigo_origen,origen_id,referencia,observaciones,codigo_sede,codigo_usuario) VALUES "; 
        $sql_factura.=$values;

        echo $sql;

        if($db->query($sql_factura)){
            echo "el lo generooooooo";
            $mensaje.="Se genero ". $referencia."<hr>";

                $sql_ejecucion="UPDATE tbl_servicios SET fecha_proximo=DATE_ADD('".$proxima_fecha."', INTERVAL " . $frecuencia ." DAY) WHERE codigo_servicio=" . $codigo_id;  
            
                echo $sql_ejecucion;
                    if(!$resultado=$db->query($sql_ejecucion)){
                        $mensaje.="Se genero factura del servicio: ". $referencia."<hr>";
                    }else{ 
                        $mensaje.="Se presento error la actualización del servicio nro. ".$codigo_id." > Error [' . $db->error . ']";
                    }
        }else{
            die('Error [' . $db->error . ']');
        }
    }

    echo $mensaje;
   
?>