<?php 
session_start();
    require(dirname(__DIR__)."/conexion/conexion.php");
    require(dirname(__DIR__)."/php/upload.php");
    $conexion=new conexion_db();
    $GLOBALS['conexion'];


//echo "<pre>";
//print_r($_FILES);
//echo "</pre>";


    $mensaje=array();

    if(isset($_POST['ID']) && $_POST['TipoModulo'] == "ModuloCliente"){

//echo "1";
        $infoData['idContacto'] = $_POST['ID'];
        $res_datos=$conexion->buscar('tbl_clientes', 'codigo_cliente='.$infoData['idContacto']);
        $res_seguridad_datos=$conexion->buscar('tbl_seguridad_clientes', 'codigo_cliente='.$infoData['idContacto']);
        $info_tabla_pagos=dataTablaPagos($_POST['ID']);
        $info_tabla_contratos=dataTablaContrato($_POST['ID']);
        $info_form_contrato_clientes=dataFormContratoCliente($_POST['ID']);

        $completeArr=array(

            'infodatos' => $res_datos,
            'info_datos_seguridad' => $res_seguridad_datos,
            'info_tabla_pagos' => $info_tabla_pagos,
            'info_tabla_contratos' => $info_tabla_contratos,
            'info_form_contrato_clientes' => $info_form_contrato_clientes,  
            'id' => $infoData['idContacto']

        );
    
        echo json_encode($completeArr);
    }

    if(isset($_POST['ID']) && $_POST['TipoModulo'] == "ModuloMotos"){
//echo "2";        
        
        $prueba['Mensaje'] = "ProbandoModuloMotos";

        $infoData['idContacto'] = $_POST['ID'];
        $res_motos_datos=$conexion->buscar('tbl_motos','codigo_moto='.$infoData['idContacto']);
        $info_tabla_motos_datos=dataTablaDatosMoto($_POST['ID']);
        $info_tabla_motos_pagos=dataTablaPagosMoto($_POST['ID']);
        $info_tabla_motos_mantenimiento=dataTablaMantenimiento($_POST['ID']);
        $cedes=sacarSedes();

        $completeArr=array(
            'info_tabla_moto_datos' =>  $info_tabla_motos_datos,
            'info_tabla_moto_pago' =>  $info_tabla_motos_pagos,
            'info_form_moto_datos' => $res_motos_datos,
            'info_tabla_mantenimiento_motos' =>  $info_tabla_motos_mantenimiento,
            'cedes' => $cedes
        );

        echo json_encode($completeArr);

    }

    if(isset($_POST['ID']) && $_POST['TipoModulo'] == "ModuloLeads"){
//echo "3";

        $res_datos=$conexion->buscar('tbl_clientes', 'codigo_cliente='.$_POST['ID']);
        $res_seguridad_datos=$conexion->buscar('tbl_seguridad_clientes', 'codigo_cliente='.$_POST['ID']);

        $completeArr=array(
            'infodatos' => $res_datos,
            'info_datos_seguridad' => $res_seguridad_datos,
        );
        
        echo json_encode($completeArr);

    }

    function sacarSedes(){

        $sql="SELECT codigo_sede, nombre FROM tbl_sedes";
        $data_pagos=$GLOBALS['conexion']->ejecutar_sql($sql);
        return $data_pagos->fetch_all(MYSQLI_ASSOC);

    }

    function dataFormContratoCliente($id){
        
        $sql="SELECT fecha_proximo_cobro, valor_pagar, frecuencia_cobro, clieTable.uso_moto as 'uso_moto'
        FROM tbl_contratos tc
        INNER JOIN tbl_clientes clieTable
        ON tc.codigo_cliente=clieTable.codigo_cliente 
        WHERE tc.codigo_cliente=".$id;

        $data_pagos=$GLOBALS['conexion']->ejecutar_sql($sql);
        return $data_pagos->fetch_all(MYSQLI_ASSOC);

    }
    function dataTablaMantenimiento($id){
        
        $sql = "SELECT 
        m.fecha_mantenimiento AS 'FECHA', 
        mc.descripcion AS 'CATEGORIA',
        LEFT(p.razon_social,12) as 'PROVEEDOR',
        m.concepto as 'CONCEPTO',";

        if($_SESSION['codigo_rol']==1){
            $sql.="CONCAT(\"<a href='#'  class='editar_categoria' data-id_mantenimiento='\", m.id_mantenimiento,\"' >\",mc.descripcion,\"</a>\") AS 'CATEGORIA',";
        }else{
            $sql.="mc.descripcion AS 'CATEGORIA',"; 
        }
        
        $sql.="format(m.valor_mantenimiento,0) AS 'VALOR', 
        m.observaciones_mantenimiento AS 'OBSERVACIONES',
        IF(dc.nombre IS NULL, 
            CONCAT(\"<a href='#' onclick='modal_subir_documento(6,11,\", m.id_mantenimiento,\")'><b>Subir</b></a>\"), 
            CONCAT(\"<a href='/archivos_cargados/registro_gastos/\", dc.nombre,\"' target='_blank'>Ver</a>\")
        ) AS 'FACTURA'
    FROM tbl_mantenimiento_motos m
    INNER JOIN tbl_mantenimiento_moto_conceptos mc ON mc.codigo_concepto = m.codigo_concepto

    LEFT JOIN tbl_proveedores p ON
    p.codigo_proveedor = m.codigo_proveedor

    LEFT JOIN tbl_conf_docs dc ON dc.codigo_padre = m.id_mantenimiento AND dc.tipo_documento = 11
    WHERE codigo_moto= " . $id;


        $data_pagos=$GLOBALS['conexion']->ejecutar_sql($sql);
        return $data_pagos->fetch_all(MYSQLI_ASSOC);
    }


    function dataTablaDatosMoto($id){

        $sql="SELECT CONCAT(clieTable.nombres,' ', clieTable.apellidos) AS 'CLIENTE', 
        tc.fecha_inicio_contrato AS 'FECHA INICIO',
        tc.fecha_final_contrato as 'FECHA FIN',
        tc.frecuencia_cobro as 'TIPO CONTRATO'
        FROM tbl_motos tm 
        INNER JOIN tbl_contratos tc
        ON tm.codigo_moto=tc.codigo_moto
        INNER JOIN tbl_clientes clieTable
        ON tc.codigo_cliente=clieTable.codigo_cliente
        WHERE tm.codigo_moto=".$id;

        $data_pagos=$GLOBALS['conexion']->ejecutar_sql($sql);
        return $data_pagos->fetch_all(MYSQLI_ASSOC);

    }

    function dataTablaPagosMoto($id){

        $sql="SELECT tbcp.numero_soporte as 'FACTURA', 
        tbcp.fecha_fin_history AS 'PERIODO', 
        tbcp.forma_pago AS 'MEDIO DE PAGO ',
        tbcp.pago_realizado AS 'VALOR'
        FROM tbl_contrato_pagos tbcp 
        INNER JOIN tbl_contratos tc
        ON tbcp.codigo_contrato=tc.codigo_contrato
        WHERE tc.codigo_moto=".$id;

        $data_pagos=$GLOBALS['conexion']->ejecutar_sql($sql);
        return $data_pagos->fetch_all(MYSQLI_ASSOC);
                
    }

    function dataTablaContrato($id){

        $sql="SELECT c.fecha_inicio_contrato AS 'INICIO', c.fecha_final_contrato AS 'FIN', m.placa AS 'PLACA', m.marca AS 'MARCA',m.linea AS 'LINEA', 
        m.modelo AS 'MODELO', ts.nombre AS 'SEDE'
        FROM tbl_contratos c
        INNER JOIN tbl_motos m
        ON c.codigo_moto=m.codigo_moto
        INNER JOIN tbl_sedes ts
        ON m.codigo_sede=ts.codigo_sede
        WHERE c.codigo_cliente=".$id;

        $data_pagos=$GLOBALS['conexion']->ejecutar_sql($sql);
        return $data_pagos->fetch_all(MYSQLI_ASSOC);


    }

    function dataTablaPagos($id){


        $sql=" SELECT numero_soporte as FACTURA, fecha_fin_history AS PERIODO, forma_pago AS 'MEDIO DE PAGO', pago_realizado AS VALOR
        FROM tbl_contratos c
        INNER JOIN tbl_contrato_pagos cp
        ON c.codigo_contrato=cp.codigo_contrato
        WHERE c.codigo_cliente=".$id;

    
        $data_pagos=$GLOBALS['conexion']->ejecutar_sql($sql);
        return $data_pagos->fetch_all(MYSQLI_ASSOC);

    }




    if(isset($_POST['tabla'])){
//echo "4";    

        /*
        echo json_encode($_POST['tipoconsulta']);
        exit();
        */
        
        $exito=false;
        $tabla=$_POST['tabla'];
        $tipoconsulta=$_POST['tipoconsulta'];

       
        if($tabla=="tbl_motos"){
            $where="codigo_moto=".$_POST['codigo_moto'];
        }else{
            $where="codigo_cliente=".$_POST['codigo_cliente'];
            $codigo_cliente=$_POST['codigo_cliente'];

        }

        /*Cuando este haciendo un cambio en la tabla seguridad tengo que validar si hare un update o un insert
        ya que si no existe el registro en la tabla lo creo.*/

        if($tabla=="tbl_seguridad_clientes"){
           $seguridad_datos=$conexion->buscar('tbl_seguridad_clientes', 'codigo_cliente='.$_POST['codigo_cliente']);
            if(count($seguridad_datos) > 0){
                $tipoconsulta = "update";  
                $where="codigo_cliente=".$_POST['codigo_cliente'];            
            }else{
                $tipoconsulta = "insert";
            }

        }

        /*
        echo json_encode($tipoconsulta);
        exit();
        */

        //Cuando la tabla sea diferente a tbl_contratos es que borro el codigo_cliente

        
        if($tabla != "tbl_contratos" && $tabla != "tbl_seguridad_clientes"){  
            unset($_POST['codigo_cliente']);
        }


        unset($_POST['tabla']);
        unset($_POST['tipoconsulta']);

        if($tipoconsulta=="update"){
             
            $setDeQuerys="";
            foreach($_POST as $kData => $vData){
                $setDeQuerys.=$kData."='".$vData."', "; 
            }
    
            $QuerySet=trim($setDeQuerys, ', ');
            $res=$conexion->actualizar($tabla, $QuerySet, $where);

            $tipo_documentos=array();
            $tipo_documentos[0]=1;
            $tipo_documentos[1]=2;
            $tipo_documentos[2]=3;
            $tipo_documentos[3]=4;

            $i=0;

            foreach ($_FILES as $file) {
                if ( $file["name"] != "") {
                  registrar_documento(1,$tipo_documentos[$i],$codigo_cliente,$file);  
                } 
              $i++;
            }

            /*
                $mensaje['respuesta']=$res;
                echo json_encode($mensaje);
                exit();
            */
            $exito=$res;
            
        }else{
            if($tabla == "leads_clientes"){
//echo "6";  
                $fuente=$_POST['fuente_leads'];
                unset($_POST['fuente_leads']);
                $res=$conexion->insertar('tbl_clientes', $_POST);



                $FECHAHOY=date('Y-m-d');

                $newArrayLeadsClientes=array(
                    'codigo_cliente' =>  $res,
                    'fuente' => $fuente,
                    'fase' => 1,
                    'FECHAINGRESO' => $FECHAHOY
                );

                $res=$conexion->insertar($tabla, $newArrayLeadsClientes);

            }else{ 
//echo "7";                

                $res=$conexion->insertar($tabla, $_POST);
                
                $i=0;
                
                $codigo_contrato=$conexion->insert_id();
                
                foreach ($_FILES as $file) {
                    if ( $file["name"] != "") {
                        registrar_documento(5,6,$codigo_contrato,$file);  
                    } 
                    $i++;
                }
                
                /*
                */
                /*
                $prueba['holaa']=$res;
                echo json_encode($prueba);
                exit();
                */

                 if($tabla == "tbl_contratos"){
                    $res=$conexion->cambiar_estado_moto($_POST['codigo_moto'], $estado=1);
                    $conexion->cambiar_estado_cliente($_POST['codigo_cliente'], $estado=0);
                }
            }

            $exito=$res;

        }
        
        $mensaje=array();
       
        if($exito == true || is_numeric($exito) == true){
            $mensaje['info']="Datos guardados correctamente";
        }else{
            $mensaje['info']="Error al guardar los datos";
        }

        echo json_encode($mensaje);
        
    }   

    //BorrarPago
    if(isset($_POST['DELETEPAGO'])){
//echo "8";
        $probando['enviar'] = $_POST;
        $condicion="codigo_contrato_pago=".$_POST['IDPAGO']." AND validado is null";
        $data_delete['sql']=$GLOBALS['conexion']->borrar("tbl_contrato_pagos", $condicion);

        $msj=array();
        

        if($data_delete){
            $msj['exito'] = "Pago borrado exitosamente!";
        }else{
            $msj['error'] = "No se pudo eliminar el pago, recuerde que solo puede eliminar pagos sin validar";
        }

        echo json_encode($msj);

    }

    
    //Le cambioamos la disponibilidad a 1 cuando damos Click

    if(isset($_POST['ChangeDisponibilidad'])){

        $msj=array();

        $idempleado="";
        if(isset($_POST['id_empleado'])&&!empty($_POST['id_empleado'])){
            $idempleado=", id_empleado=".$_POST['id_empleado'];
        }

        $sqlUpdate="UPDATE leads_clientes SET disponible=".$_POST['disponibilidad'].$idempleado."
        WHERE codigo_cliente=".$_POST['codigo_cliente'];

        /*
        $sql['sql'] = $sqlUpdate;
       + echo json_encode($sql);
        exit();
        */

        $res=$GLOBALS['conexion']->ejecutar_sql($sqlUpdate);
        if($res){
            $msj['exito'] = "Datos actualizados correctamente";
        }else{
            $msj['error'] = "Error";
        }
     
        echo json_encode($msj);
    }


    if(isset($_POST['changeEstadoLeds'])){
//echo "9";

        $msj=array();
        $sqlUpdate="UPDATE leads_clientes SET fase=".$_POST['faseNew']." WHERE codigo_cliente=".$_POST['codigo_cliente'];

        $res=$GLOBALS['conexion']->ejecutar_sql($sqlUpdate);
        if($res){
            $msj['exito'] = "Datos actualizados correctamente";
        }else{
            $msj['error'] = "Error";
        }
     
        echo json_encode($msj);


    }



?>