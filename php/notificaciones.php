<?php

include_once(dirname(__DIR__)."/conexion/conexion.php");

	$db_notificaciones = array(
		'conexion' => new conexion_db()
	);

	class notificaciones {

		protected $conexion;

		public function __construct() {

			global $db_notificaciones;
        	$this->conexion =& $db_notificaciones;
    	}
		
		public function consulta($email, $nombre_consulta, $filtro){
			
			if( !empty($nombre_consulta) ){
				
				
				$con=$this->conexion['conexion'];
				
				$query = " SELECT consulta FROM tbl_conf_consultas WHERE nombre_consulta= '".$nombre_consulta."'";

				$resultado=$con->ejecutar_sql($query);
				$resultado=$resultado->fetch_all(MYSQLI_ASSOC);
				
				//print_r($resultado);
				
				$query=$resultado[0]["consulta"];
				$query=str_replace("<<filtro>>",$filtro,$query);	
				
				$resultado=$con->ejecutar_sql(strval($query));
				
				$html=dirname(__DIR__)."/php/plantillas/".$nombre_consulta.".html";
				
				$contenido = file_get_contents($html);
				
				if($resultado->num_rows == 1){
					
					$resultado=$resultado->fetch_all(MYSQLI_ASSOC);	
					
					$registro=$resultado[0];
					
					foreach ($registro as $item => $value){
						$contenido=str_replace("{" . $item . "}",$value,$contenido);	
					}
					
					$asunto=$resultado[0]['asunto'];
					$cabecera= 'MIME-Version: 1.0' . "\r\n";
					$cabecera.= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$cabecera.= "From:Zaguez <info@kairos.app> " . "\r\n" . "CC: info@kairos.app ";
					
					mail($email,$asunto,$contenido,$cabecera);
					
				}else{
					$retorno["mensaje"]="Error en el usuario o la contraseña.";
					$retorno["resultado"]=0;
				}
				
			}

			return $retorno;
		}
		
	}
	
/*
	$notificar = new notificaciones();
	$email="jorgemario.com@gmail.com";
	$nuevo_registro=1;
	$notificar->consulta($email,'notificacion_sede_nuevo',' where s.codigo_sede='. $nuevo_registro);
	echo $notificar;
	
	$html=dirname(__DIR__)."/php/plantillas/invitacion.html";
	$contenido = file_get_contents($html);
	$asunto="INVITACIÓN ESPECIAL EVENTO COTELCO 2023 JUL 26/27 (SIN COSTO)";
	$cabecera= 'MIME-Version: 1.0' . "\r\n";
	$cabecera.= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabecera.= "From: info@cotelcoatlantico.org";
	$email= "ezamora@marketingdigitalideaz.com";
	// . "\r\n" . "CC: info@kairos.app ";
	mail($email,$asunto,$contenido,$cabecera);
	*/
?>