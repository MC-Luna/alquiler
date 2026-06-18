<?php

    // CONEXION CON BASE DE DATOS

    $mysql_host="localhost";
    $mysql_database="s19ff36e_kairos";
    $mysql_user="s19ff36e_ukairos";
    $mysql_password="Kairos2026#";
    $error="";
    
    $db = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
    
    if($db->connect_errno > 0){
        die('Error en la conexion de base de datos [' . $db->connect_error . ']');
        $error.="Error en la conexión de cobros ". $db->connect_error;

    }

    $sql="SET time_zone = '-5:00'";
    if(!$result= $db->query($sql)){
        die('Error en consulta de time zone [' . $db->error . ']');
        $error.=" Error en la conexión de base de datos en la generación de cobros ". $db->connect_error;
    }
    
    require('elibom/elibom.php');

    // ESTABLECER HUSO HORARIO EN COLOMBIA
    date_default_timezone_set('America/Bogota');
    $numero=date('Gi');
    echo "Esta es la hora: ". $numero;

    $sql='SELECT 
    c.codigo_contrato,
    c.codigo_cliente,
    cl.nombres,
    cl.celular,
    c.frecuencia_cobro
    from tbl_contratos c
    
    INNER join tbl_clientes cl ON
    cl.codigo_cliente = c.codigo_contrato
    
    LEFT JOIN tbl_contrato_pagos p ON
    p.codigo_contrato = c.codigo_contrato AND date(p.fecha_registro) = CURDATE() 
    
    WHERE c.fecha_proximo_cobro=CURDATE() AND p.codigo_contrato_pago IS NULL ';

    
    if(!$result=$db->query($sql)){ 
        die('Error [' . $db->error . ']');
        $error="Error en la consulta de clientes por cobrar ". $db->connect_error;
    }else{
        
        $c_pagos=0;
        $listado_sms="";

        while($cliente = $result->fetch_array(MYSQLI_NUM)){
              
            $codigo_contrato=$cliente[0];
            $codigo_cliente=$cliente[1];
            $nombre=$cliente[2];
            $sms_numero=$cliente[3];
            $frecuencia=$motor[3];

            echo $codigo_contrato;
            echo "----";
            
            // GENERAR PAGO PENDIENTE PARA EL DIA DE HOY
            $sql_pago='UPDATE tbl_contratos SET pendiente_pago=1 where codigo_contrato='. $codigo_contrato;
            
            // SE COMUNICA SU NUEVO PAGO GENERADO
            if(!$result_pago=$db->query($sql_pago)){ 
                die('Error [' . $db->error . ']');
                $error.="Error en actualizar pendientes de pago ". $db->connect_error;
            }else{
                echo "Envio a este ". $nombre. " - ";

                try {
                    $c_pagos++;
                    // Asignar aquí la credenciales de la cuenta elibom de esta manera:
                    //$elibom = new ElibomClient('email@correo.com', 'password');
                    $sms_mensaje= $nombre . " mototrabajo te recuerda subir el soporte de pago en este link https://app.mototrabajo.com/@". $codigo_cliente. " para que sigas disfrutando de nuestro servicio";
                    $deliveryId = $elibom->sendMessage($sms_numero,$sms_mensaje);
                    echo "Se genero el cobro para el cliente: ".$nombre. " con numero de celular ". $sms_numero. "</br><hr></br>";
                    $listado_sms.= $c_pagos." ) Se genero el cobro para el cliente: ".$nombre. " con numero de celular ". $sms_numero. "\r\n";
                } catch (Exception $e) {
                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    $listado_sms.= $c_pagos." ) Se presento error [". $e->getMessage() ."] en generar el cobro  del cliente: ".$nombre. " con numero de celular ". $sms_numero. "\r\n";
                }
                
            }
        
        }
        
        //$deliveryId = $elibom->sendMessage(3005370289,$sms_mensaje);
        // CONFIRMACIÓN DE ENVIO DE SMS
        
        $subject = "KAIRUS: Se genero ". $c_pagos ." SMS de Cobros ";

        $txt.="Listado de Personas que se le envio el sms. ". "\r\n";
        $txt.= $listado_sms;
        $headers = "From: info@app.mototrabajo.com " . "\r\n" .
        "CC: info@app.mototrabajo.com ";
        
        $email="erickzamoramontejo@gmail.com";
        mail($email,$subject,$txt,$headers);
        
        $email="davidzarcop@hotmail.com";
        mail($email,$subject,$txt,$headers);
        
        $email="mototrabajocolombia@gmail.com";
        mail($email,$subject,$txt,$headers);
        
        /*
        */
                
   }

?>