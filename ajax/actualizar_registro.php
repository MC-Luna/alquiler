<?php
	session_start();
	require_once(dirname(__DIR__)."/conexion/conexion.php");

	$conexion=new conexion_db();

	$tabla = $_POST['tabla'];
	$modo = $_POST['modo'];
	$filtro = $_POST['filtro']!='' ? $_POST['filtro'] : '1'; //SI NO SE ENVIA FILTRO SE ASUME QUE ES UN REGISTRO NUEVO.

	//BUSCAMOS LAS COLUMNAS DE LA TABLA.
	$sql = "show columns from ".$tabla;
	$result=$conexion->ejecutar_sql($sql) or die("Error: ".$conexion->error());
	
	if(!$result){
		$data['resultado'] = 'NA';
		$data['mensaje'] =  'Error:'.$conexion->error().' SQL:'.$sql;
	}else{
		$num=0;
		while($row=$result->fetch_array(MYSQLI_NUM)){
			//HACEMOS UN RECORRIDO POR LOS CAMPOS DEL FORMULARIO
			foreach ($_POST as $campo => $valor) {
				//SI EL CAMPO DEL FORMULARIO ES IGUAL AL CAMPO DE LA TABLA GUARDAMOS LOS DATOS EN $registro.
				if($campo == $row[0]){
					if($valor!=''){
						$registro[$num][0] = $campo;
						$registro[$num][1] = "'".$valor."'";
						$num++;
						break;
					}
				}
			}
		}		
		
		//GUARDAMOS LOS DATOS EN LA BASE DE DATOS. MODO 1:NUEVO; 2:EDICION
		if($modo=='1'){
			$sql="INSERT INTO " . $tabla . " (";
			for($i=0;$i<$num;$i++){
				if($i>0){
					$sql.= ",";
					}
				$sql.=$registro[$i][0];
				
			}
			$sql.=") VALUES (";
			for($i=0;$i<$num;$i++){
				if($i>0){
					$sql.= ",";
				}
							
				$sql.=$registro[$i][1];
			}		
			
			$sql.=")";	
		
		}else{
			$sql="UPDATE  " . $tabla . " SET ";
			
			for($i=0;$i<$num;$i++){
				if($i>0){
					$sql.= ",";
				}
				
				$sql.=$registro[$i][0] . "=" . $registro[$i][1];
			}			
		
			$sql.=" WHERE " . $filtro;
		}
		
		$result = $conexion->ejecutar_sql($sql) or die("Error: ".$conexion->error());
		if(!$result){
			if ($conexion->error()!=""){
				$data['resultado'] = '-1';
				$data['id'] = 0;
				$data['mensaje'] = 'No se ejecutó la consulta.' . $sql . ' ' . $conexion->error();
			}else{
				$data['resultado'] = '0';
				$data['mensaje'] = 'No hubo cambios que guardar.';
				$data['id'] = 0;
			}
		}else{

			$data['resultado'] = "1";
			$data['id'] = $conexion->insert_id();
			$data['mensaje'] = "Los datos se guardaron con éxito.";

			switch ($tabla) {
				case 'tbl_caja_menor':

					include(dirname(__DIR__)."/php/notificaciones.php");
	
					$notificar = new notificaciones();

					$query = " SELECT 
						p.correo email
						FROM tbl_proveedores p
						
						INNER JOIN tbl_caja_menor cm ON
						cm.codigo_proveedor = p.codigo_proveedor where cm.codigo_transaccion=".$data['id'];
					$resultado=$conexion->ejecutar_sql($query);
					
					$resultado=$resultado->fetch_all(MYSQLI_ASSOC);	
					$email=$resultado[0]["email"];
					$notificar->consulta($email,'notificacion_servicio_nuevo',' where cm.codigo_transaccion='. $data['id']);
					
					/*
					$celular=trim("573005370289");
					$mensaje="Hola jorge";
					$mensaje=urlencode($mensaje);
					$url = "http://api.labsmobile.com/get/send.php?username=ezamora@marketingdigitalideaz.com&password=SbDf41X7KS66&msisdn=".$celular."&message=". $mensaje;
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HEADER, true);
					$result = curl_exec($ch);
					$message = htmlentities('Message has been sent.<br />Details:' . "<br />" . $result);
					//echo $message; 
					$data['mensaje'] = "si paso ppor aquuí.". $message;
					*/
					
					break;
				case 1:
					echo "i equals 1";
					break;
				case 2:
					echo "i equals 2";
					break;
			}
				
					
		}	
		$conexion->close();
	}
	
	echo json_encode($data);  
?>