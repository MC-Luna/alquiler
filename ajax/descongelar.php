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
                    
    $sql=' call descongelar('.$_POST["codigo_congelar"].',"'.$_POST["fecha_proximo_cobro"].'");'; 
   
    if(!$result=$db->query($sql)){ 
        die('Error [' . $db->error . ']');
        $data['mensaje']="Error al momento de descongelar". $db->connect_error;
        $data['resultado']=0;
    }else{

        $result->close();
        $db->next_result();

        $sql = "SELECT c.correo FROM tbl_congelamientos cc INNER JOIN tbl_clientes c ON c.codigo_cliente = cc.codigo_cliente WHERE cc.codigo_congelar=". $_POST['codigo_congelar'];
        if(!$result= $db->query($sql)){
            die('Error en busqueda del correo [' . $db->error . ']');
        }
        $resultado=$result->fetch_all(MYSQLI_ASSOC);	
        $email=$resultado[0]["correo"];

        //include_once(dirname(__DIR__)."/conexion/conexion.php");
        include(dirname(__DIR__)."/php/notificaciones.php");
        
        $notificar = new notificaciones();
        $notificar->consulta($email,'notificacion_descongelar',' where co.codigo_congelar='. $_POST['codigo_congelar']);

        $data['mensaje'] = "Se registro el descongelamiento";
        $data['resultado'] = $row['resultado'];

    }
    echo json_encode($data);
?>