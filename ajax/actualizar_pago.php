<?php
    require(dirname(__DIR__)."/conexion/conexion.php");
    $_con = new conexion_db();
    $db = $_con->getConnection();
    $GLOBALS["db"] = $db;

    $error="";
    $db->query("SET time_zone = '-5:00'");


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


    $queryDatos="SELECT
                p.codigo_contrato AS 'Contrato',
                date(p.fecha_registro) AS 'Fecha',
                p.forma_pago as 'Forma de Pago',
                p.valor AS 'Valor',
                format(p.pago_realizado,0) AS 'Pago Realizado',
                format(p.valor - p.pago_realizado,0) AS 'Debe',
                
                date_add(cpp.fecha_proximo_cobro, INTERVAL -cpp.frecuencia_cobro DAY) as 'Fecha Inicio',
                cpp.fecha_proximo_cobro AS 'Fecha Fin'
                
                FROM 
                tbl_contrato_pagos p
                
                INNER JOIN tbl_contratos cpp ON 
                cpp.codigo_contrato = p.codigo_contrato 
                
                where p.codigo_contrato=".$_POST["codigo_contrato"]." order by p.fecha_registro desc";

                if(!$todaLaData=$GLOBALS['db']->query($queryDatos)){ 
                    die('Error 78 [' . $GLOBALS['db']->error . ']');
                    $error="Error 78 ".$GLOBALS['db']->connect_error;
                }else{

                    $dataArray=$todaLaData->fetch_all(MYSQLI_ASSOC);
                    $allData["datos"] = $dataArray;
    
                    $valorTotal = $allData['datos'][0]['Valor'];
                    $fechaInicio = $allData['datos'][0]['Fecha Inicio'];
                    $fechaFin = $allData['datos'][0]['Fecha Fin'];

                    // Si el pago fue creado sin monto (subida pública), usar valor_pagar del contrato
                    if(empty($valorTotal) || $valorTotal == 0){
                        $resValor = $GLOBALS['db']->query("SELECT valor_pagar FROM tbl_contratos WHERE codigo_contrato=".$_POST["codigo_contrato"]." LIMIT 1");
                        if($resValor && $row = $resValor->fetch_assoc()){
                            $valorTotal = $row['valor_pagar'];
                        }
                    }
                
                }

                $PagoRealizado = $_POST['pagorealizado'];

                $mensaje['fechafin'] = $fechaFin;
               // echo json_encode($mensaje);

                function calculoPositivo($pagoRealizado, $vTotal,$llamada){

                    /* 
                      Valido cuando el vTotal sea igual a 0, porque significa que estoy llamando la function
                      cuando el pago que realizo el cliente fue el doble de mayor al vTotal por lo tanto el calculo que este hace 
                      solo me deja un sobrante y ese sobrante es el que guardo como positivo.
                    */

                    $mensaje['llamadas'] = $llamada;
                    $mensaje['vtotal'] = $vTotal;
                    $mensaje['pago'] = $pagoRealizado;
                    //echo json_encode($mensaje);

                    if($vTotal==0){
                        $saldoPositivo=$pagoRealizado;
                    }else{
                        $saldoPositivo = $pagoRealizado - $vTotal;
                    }
                    

                    $sqlSeeDatos='SELECT * FROM tbl_saldo_positivo WHERE codigo_contrato= '.$_POST['codigo_contrato'];
                    $SeeDatos=$GLOBALS["db"]->query($sqlSeeDatos);
                    $dataArray=array();
                    $ThePositivo=0;

                    if($SeeDatos->num_rows == 0){ 
                        $sql='INSERT INTO tbl_saldo_positivo(saldo,codigo_contrato) VALUES('.$saldoPositivo.','.$_POST["codigo_contrato"].')';
                    }else{
                    
                        $dataArray=$SeeDatos->fetch_all(MYSQLI_ASSOC);
                        $ThePositivo=$dataArray[0]['saldo'];

                        if($ThePositivo == 0){
                            $saldoPositivo=$saldoPositivo;
                        }else{
                            $saldoPositivo=$ThePositivo+$saldoPositivo;
                        }

                        $sql="UPDATE tbl_saldo_positivo SET saldo=$saldoPositivo WHERE codigo_contrato= ".$_POST['codigo_contrato'];

                        //LO HARE DE LA SIGUIENTE MANERA, CUANDO el saldo positivo sea 0 solo guardo el nuevo saldo porque cada vez que se valide un pago el va revisar si existe
                        //positivo para ese usuario y ahi es donde lo ve tomar y lo va pasar a 0 y el saldo se lo va restar a la nueva cantidad y lo va guardar en la BD.
                        
                    }


                    if(!$resultado=$GLOBALS['db']->query($sql)){ 
                        die('Error 12 calculo positivo'.$saldoPositivo.'[' . $GLOBALS['db']->error . ']');
                        $error="Error 27 ".$GLOBALS['db']->connect_error;
                    }else{
                        
                        return  true;
                        //Returno un true para avisar que estoy introduciendo un positivo, y por lo tanto no puedo sacarlo en el mismo pago tengo que sacarlo 
                        //en el siguiente.
                    }

                   
                   
                }  


                //Cuando el pago mas del doble 
    

                 //Function para sacar el positivo que quedo.
                function sacarPositivo(){
                    $sql="SELECT * FROM tbl_saldo_positivo WHERE codigo_contrato= ".$_POST['codigo_contrato'];

                    
                    if(!$resultado=$GLOBALS['db']->query($sql)){ 
                        die('Error 11 [' . $GLOBALS['db']->error . ']');
                        $error="Error 28 ".$GLOBALS['db']->connect_error;
                    }else{

                        if($resultado->num_rows == 0){
                            $positivo=0;
                        }else{
                            $dataArray=$resultado->fetch_all(MYSQLI_ASSOC);
                            $positivo = $dataArray[0]['saldo'];
                        }

                        
                        $sql="UPDATE tbl_saldo_positivo SET saldo=0 WHERE codigo_contrato= ".$_POST['codigo_contrato'];

                        if(!$result=$GLOBALS['db']->query($sql)){ 
                            die('Error 11 [' . $GLOBALS['db']->error . ']');
                            $error="Error 29 ".$GLOBALS['db']->connect_error;
                        }
                        

                    return $positivo;

                }
            }

            
            //Function para ver el positivo final.
            function verPositivo(){

                $DataPositivo=0;

                $sqlVerPositivo='SELECT * FROM tbl_saldo_positivo WHERE codigo_contrato= '.$_POST['codigo_contrato'];
                if(!$resultadoPositivo=$GLOBALS['db']->query($sqlVerPositivo)){ 
                    die('Error 11 cambiar dia pago'.$sqlVerPositivo.'[' . $GLOBALS['db']->error . ']');
                    $error="Error 29 ".$GLOBALS['db']->connect_error;
                }else{
                    
                    if($resultadoPositivo->num_rows > 0){
                        $RPositivo=$resultadoPositivo->fetch_all(MYSQLI_ASSOC);
                        $DataPositivo=$RPositivo[0]['saldo'];
                    }   

                }

                return $DataPositivo;

            }

    // RECIBO VARIABLES EN POST - codigo_contrato, codigo_contrato_pago,forma_pago,codigo_banco
    
    // Actualizar campo de  tbl_contrato a pendiente pago = 0

    $sql='UPDATE tbl_contratos set pendiente_pago=0 where codigo_contrato='. $_POST["codigo_contrato"];
    
    if(!$result=$db->query($sql)){ 
        die('Error 1 [' . $db->error . ']');
        $error="Error en actualizar el estado del contrato ". $db->connect_error;
    }else{
        

            $sql='SELECT frecuencia_cobro, fecha_proximo_cobro from tbl_contratos where codigo_contrato='.$_POST["codigo_contrato"];
            
            // consultar periodo de frecuencia segun contrato
            if(!$result=$db->query($sql)){ 
                die('Error 3 [' . $db->error . ']');
                $error="No pudo consultar la frecuencia ". $db->connect_error;

            }else{
               

                $row = $result->fetch_array(MYSQLI_NUM);
                $frecuencia=$row[0];
                $fechaCobroAnterior = $row[1];
                $saldoPositivo=false;
                $realmacenarPositivo=false;

                //Function para cambiar fecha de cobro pago.

                function CambiarDiaPagos( $fechaCobroAnterior, $frecuencia){
                    
                    $sql='UPDATE tbl_contratos SET fecha_proximo_cobro=DATE_FORMAT(DATE_ADD("'.$fechaCobroAnterior.'", INTERVAL ' . $frecuencia .' DAY),"%Y-%m-%d") WHERE codigo_contrato=' . $_POST["codigo_contrato"];

                    if(!$result=$GLOBALS['db']->query($sql)){ 
                        die('Error 11 cambiar dia pago'.$sql.'[' . $GLOBALS['db']->error . ']');
                        $error="Error 29 ".$GLOBALS['db']->connect_error;
                    }

                }


                $pago_realizado_ciclo=0;

                //Saco mi positivo anterior para hacer el calculo completo.
                $DataPositivo=sacarPositivo();

                $mensaje['positivoAnterior'] = $DataPositivo;

               

                //Tomar en cuenta todos los pagos realizados en ese ciclo;
                $sql='SELECT * FROM tbl_contrato_pagos WHERE codigo_contrato = '.$_POST["codigo_contrato"]." AND fecha_fin_history= '".$fechaFin."'";
                $resulTado=$db->query($sql);

                if($resulTado->num_rows > 0){

                    $newData=$resulTado->fetch_all(MYSQLI_ASSOC);
                    $arrayValores = array();

                    foreach($newData as $valores){
                        array_push($arrayValores, $valores['pago_realizado']);
                    }

                    $pago_realizado_ciclo = array_sum($arrayValores) + $PagoRealizado + $DataPositivo;

                }else{
                    $pago_realizado_ciclo=$PagoRealizado + $DataPositivo;
                }
    

                $mensaje['pagorealizadociclo'] =$pago_realizado_ciclo;


                if($pago_realizado_ciclo == $valorTotal){

                    CambiarDiaPagos($fechaCobroAnterior,$frecuencia);

                }else if($pago_realizado_ciclo > $valorTotal){

                    $cantidadFinal=0;
                    $elValor=0;
                    if($valorTotal * 2 <=  $pago_realizado_ciclo){

                        $fraccion=$pago_realizado_ciclo / $valorTotal;

                        $cantidad = floor($fraccion);
                        
                        $valorEquivalente=$valorTotal * $cantidad;
                        $cantidadFinal= $pago_realizado_ciclo-$valorEquivalente; 

                        $frecuenciaSuma=$frecuencia * $cantidad;

                        $llamada="llamada2"; 
                        CambiarDiaPagos( $fechaCobroAnterior, $frecuenciaSuma);
                        calculoPositivo($cantidadFinal,$elValor,$llamada);
                       

                    }else{
                        $llamada="llamada3"; 
                        calculoPositivo($pago_realizado_ciclo, $valorTotal,$llamada);
                        CambiarDiaPagos( $fechaCobroAnterior, $frecuencia);
                        
                    }

                }else{
                    //Si no se cumple ninguna de las siguientes condiciones significa que el pago que realizo mas el positivo es menor al ciclo por lo tanto vuelvo almancenar el positivo.
                    if($DataPositivo != 0){
                        $realmacenarPositivo=true;
                    }
                    
                }
                
                }



                if(!$result=$db->query($sql)){ 
                    die('Error 4 [' . $db->error . ']');
                    $error="No pudo actualizar la frecuencia ". $db->connect_error;
    
                }
                if($error=""){
                    echo "lo realizo todo ";
                }else{
                    echo $error;
                }



                // Actualizar campo de tbl_contrato_pago a validado=1

                    //buscar si tiene saldo positivo y sumarlo al pago realizado;
                    //Cuando saldo positivo es true significa que estoy metiendo saldo positivo por lo tanto la function de sacarPositivo tengo que sacarla cuando sea false. 


                    //Positivo sobrante;

                    //Valido si tengo que realmacenar el positivo esto cuando el pago que se realizo + el positivo es menor.
                    if($realmacenarPositivo==true){
                        $positivoNuevo=$DataPositivo;

                        //Realmaceno el positivo nuevamente 
                        $sql="UPDATE tbl_saldo_positivo SET saldo=".$positivoNuevo." WHERE codigo_contrato=".$_POST["codigo_contrato"];

                       
                        if(!$result=$db->query($sql)){ 
                            die('Error 18 [' . $db->error . ']');
                            $error="Error en realmacenar el positivo ". $db->connect_error;
                        }else{
                            $data['mensaje'] = "Datos guardados correctamente!";
                        }              
                        
                    }else{
                        $positivoNuevo=verPositivo();
                    }
                    

                    $mensaje['positivoNuevo']=$positivoNuevo;

                    
                    $sql='UPDATE tbl_contrato_pagos 
                    set validado=1, numero_soporte="'.$_POST["soporte_pago"].'", observaciones="'.$_POST["observaciones_pago"].'",
                    forma_pago="'.$_POST["forma_pago"].'", pago_realizado="'.$PagoRealizado.'", 
                    fecha_inicio_history="'.$fechaInicio.'", saldo_positivo="'.$positivoNuevo.'", 
                    fecha_fin_history="'.$fechaFin.'", codigo_banco='.$_POST["codigo_contrato"].' 
                    where codigo_contrato_pago='. $_POST["codigo_contrato_pago"];


                    //echo json_encode($mensaje);
                    if(!$result=$db->query($sql)){ 
                        die('Error 2 [' . $db->error . ']');
                        $error="Error en actualizar el pago del contrato ". $db->connect_error;
                    }else{
                        $data['mensaje'] = "Datos guardados correctamente!";
                        echo json_encode($data);
                        exit();
                    }

                
            
        }
    
?>