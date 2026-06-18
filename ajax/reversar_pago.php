<?php
    // CONEXION CON BASE DE DATOS
    $mysql_host="localhost";
    $mysql_database="s19ff36e_kairos";
    $mysql_user="s19ff36e_ukairos";
    $mysql_password="Kairos2026#";
    $error="";
    
    $db = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
    $GLOBALS["db"];

    if($db->connect_errno > 0){
        die('Error en la conexion de base de datos [' . $db->connect_error . ']');
    }

    $sql="SET time_zone = '-5:00'";
    if(!$result= $db->query($sql)){
        die('Error en consulta de time zone [' . $db->error . ']');
    }    
                    
    $sql=' call reversarUltimoPago('.$_POST["codigo_contrato_pago"].')'; 
   
    if(!$result=$db->query($sql)){ 
        die('Error 2 [' . $db->error . ']');
        $data['mensaje']="Error al momento de reversar el pago ". $db->connect_error;
        $data['resultado']=0;
    }else{
        $data['mensaje'] = "Se reverso el pago nro. ". $_POST["codigo_contrato_pago"];
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $data['resultado'] = $row['resultado'];
        echo json_encode($data);
        exit();
    }
?>