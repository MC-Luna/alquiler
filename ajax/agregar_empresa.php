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
                    
    $sql='INSERT INTO tbl_empresas (nombre) VALUES ("'.$_POST["nombre"].'");'; 
   
    if(!$result=$db->query($sql)){ 
        die('Error [' . $db->error . ']');
        $data['mensaje']="Error al momento de registrar la empresa". $db->connect_error;
        $data['resultado']=0;
    }else{
        $data['mensaje'] = "Se registro la empresa";
        $data['resultado'] = $row['resultado'];
    }
    echo json_encode($data);
?>