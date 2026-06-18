<?php



	require(dirname(__DIR__)."/conexion/conexion.php");



	$GLOBALS = array(

		'conexion' => new conexion_db()

	);

	

	class registro {

		

		protected $conexion;

		

		public function __construct() {

			

			global $GLOBALS;

        	$this->conexion =& $GLOBALS;

    	}

		

	public function guardar( array $data ){

		if( !empty( $data ) ){

			$con=$this->conexion['conexion'];

			$infoReturn=array();

			$trimmed_data = array_map('trim', $data);

			$campos=array();

			$c= explode(",", $trimmed_data['campos']);

			$f= explode(",", $trimmed_data['formulario']);

			$include= $trimmed_data['include'];



			$i=0;

			foreach ($c as $reg) {



    			$campos[$reg] = $trimmed_data[$f[$i]] ;



    			$i++;

			}





			/* El parametro de tipoEjecucion es para evaluar si se esta creando un contrato

			y ejecutar el metodo que me cambiara el estado de la moto*/





			if(isset($trimmed_data['tipoEjecucion']) &&

				 $trimmed_data['tipoEjecucion'] == "createContrato" && !empty($campos['codigo_moto'])){



				$resultado=$con->cambiar_estado_moto($campos['codigo_moto'], $estado=1);

				if(!$resultado){

					echo "ERROR 75863";

				};



			}



			/*

				$diasCobros =$trimmed_data['frecuencia'];

				$proximoCobro = $trimmed_data['proximocobro'];



				$fecha_actual =  date_create($proximoCobro);



				$prueba6=date_add($fecha_actual,date_interval_create_from_date_string($diasCobros." days"));

				$prueba7=date_format($prueba6,"d-m-y");



				

				$prueba2['diasCobros'] = $diasCobros;

				$prueba2['proximoCobro'] = $proximoCobro;

				$prueba = strtotime($fecha_actual,"+1 day");

				$prueba3 = date('d-m-Y',$prueba);



				$email = "jorgemario.com@gmail.com";

				$subject = "MotoTrabajo: ueva sede";

				$txt =" Se ha generado la sede ". $nuevo_registro;

				$headers = "From: info@app.mototrabajo.com " . "\r\n" ."CC: info@app.mototrabajo.com ";

				mail($email,$subject,$txt,$headers);

			*/



			

			$resultado=$con->insertar($trimmed_data['tabla'],$campos);

			

			if ($resultado) {

				

				$nuevo_registro=$resultado;

				$include=substr($trimmed_data['tabla'],4);

				$ubicacion =dirname(__DIR__)."/php/include/".$include.".php";



				if (file_exists($ubicacion)) {

					include($ubicacion);	

				}

		

				return "Se ha agregado correctamente ";

				

			}else{

				return "No se logro realizar el registro, intentar otra vez";

			}

			





		}else{

			return "No se cargaron los datos.";

		}

	}



	public function editar( array $data ){



		

		

		$con=$this->conexion['conexion'];



		//Aqui voy a cambiar estado del contrato y para la moto usare la function de cambiar_estado_motos.



		$msj=array();



		if(isset($data['editoContrato']) && !empty($data['idContrato']) && !empty($data['idMoto']))

		{



			$sql="UPDATE tbl_contratos SET activo=0, 

				fecha_final_contrato="."'".$data['fecha_nueva_final']."' , observacion_cierre='".$data['observacion_cierre']."' WHERE codigo_contrato=".$data['idContrato'];



			$resulEstadoMoto=$con->cambiar_estado_moto($data['idMoto'], $estado=0);



			if(!$resulEstadoMoto){

				$msj['error'] = "Error al actualizar estado moto"; 

				exit();

			}





			$result=$con->ejecutar_sql($sql);



			if($result){

				$msj['exito'] = "Se ha dado de baja el contrato exitosamente";

			}else{

				$msj['error'] = "Error al actualizar";

				exit();

			}

			

			return $msj;

			

		}

		

		if( !empty( $data ) ){

			

			

			$trimmed_data = array_map('trim', $data);



			$condicion= $trimmed_data['tabla_id']."=".$trimmed_data['codigo'];

			$campos=$trimmed_data['campo'].'="'.$trimmed_data['valor'].'"';

			



			$resultado=$con->actualizar($trimmed_data['tabla'], $campos, $condicion);

			

			if ($resultado) {

				

				/*

					$nuevo_registro=$resultado;

					$include=substr($trimmed_data['tabla'],4);

					$ubicacion =dirname(__DIR__)."/php/include/".$include.".php";

					

					

					$email = "jorgemario.com@gmail.com";

					$subject = "MotoTrabajo: ueva sede";

					$txt =" Se ha generado la sede ". $nuevo_registro;

					$headers = "From: info@app.mototrabajo.com " . "\r\n" ."CC: info@app.mototrabajo.com ";

					

					mail($email,$subject,$txt,$headers);

					

					if (file_exists($ubicacion)) {

						include($ubicacion);	

					}

				*/

				

				return "Se ha actualizado con exito";

				

			}else{

				return "No se logro realizar el registro, intentar otra vez";

			}

			

		}else{

			return "No se cargaron los datos.";

		}

	}



}



?>