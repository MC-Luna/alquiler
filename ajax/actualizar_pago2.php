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

    //Valido si el nro de soporte ya existe.

    $sql="SELECT * FROM tbl_contrato_pagos WHERE numero_soporte= '".$_POST["soporte_pago"]."' AND codigo_contrato=".$_POST["codigo_contrato"];
    if(!$resultadoSoporte=$GLOBALS['db']->query($sql)){ 
        die('Error 12 soporte [' . $GLOBALS['db']->error .$sql. ']');
        $error="Error 25 ".$GLOBALS['db']->connect_error;
        
    }else{
        if($resultadoSoporte->num_rows > 0){

            $data['mensaje'] = "soporteRepetido";
            echo json_encode($data);
            exit();
        }
    }

    //echo json_encode($mensaje);
 /*
    if(!$result=$db->query($sql)){ 
        die('Error 2 [' . $db->error . ']');
        $error="Error en actualizar el pago del contrato ". $db->connect_error;
    }else{
        $data['mensaje'] = "Datos guardados correctamente!";
        echo json_encode($data);
        exit();
    }
*/

    $mensaje="";
    $i=0;
    $query_cobros="";
    foreach ( $_POST["valor"] as $valor) { 

        if($valor<>""){

            $valor=str_replace(".","",$valor);
            $valor=str_replace(",","",$valor);
            $observacion=$_POST["observacion"][$i];

            if($_POST["producto"][$i]=="contrato"){

                $mensaje.= " Cuota de Contrato Nro. ". $_POST["codigo_contrato"][$i]. " por valor: $".$_POST["valor"][$i]. " registrado exitosamente.\n";
                $PagoRealizado = $valor;

                include('pago_contrato.php');

            }else{
                $mensaje.= "Cobro Extra Nro. ". $_POST["codigo_producto"][$i]. " por valor: $".$_POST["valor"][$i]. " registrado exitosamente.\n";
                
                // Validar si se registro ante un contrato, actualizar - sino crear registro de pago
                // CALL pago_cobro_extra(748,8082,5,100,'jorge','efectivo',1,'observacion');
                $query_cobros.=' call pago_cobro_extra('.$_POST["codigo_contrato"].','.$_POST["codigo_contrato_pago"].','.$_POST["codigo_producto"][$i].','.$valor.',"'.$_POST["soporte_pago"].'","'.$_POST["forma_pago"].'",'.$_POST["codigo_banco"].',"'.$_POST["observacion"][$i].'",'.$_POST["codigo_usuario"].','.$_POST["codigo_cuenta"].');'; 

            }

        }
        $i++; 
    }

    mysqli_multi_query($db, $query_cobros);

    // Recuperar resultados
    do {
        if ($result = mysqli_store_result($db)) {
            // Procesar el conjunto de resultados
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($db));

    $db->close();

    $data['mensaje'] = $mensaje . $query_cobros;
    echo json_encode($data);

?>