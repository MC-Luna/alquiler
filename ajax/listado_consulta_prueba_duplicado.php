<?php
	
	session_start();
	require_once(dirname(__DIR__)."/conexion/conexion.php");
	if (isset($_POST)){
		//listado_consulta($_POST["consulta"],$_POST["filtro"],$_POST["opcion"]);
	}

	echo listado_consulta("listado_contratos2"," 1",1);
	function listado_consulta($codigo_consulta,$filtro_campo,$opcion){

		$conexion=new conexion_db();
		$res=$conexion->buscar("tbl_conf_consultas","nombre_consulta='".$codigo_consulta."'");


		if (empty($res)) {
			$retorno["resultado"]=0;
			$retorno["mensaje"]="No se encontró la consulta!";
		}else{

			$num_campos_ocultos=$res[0]["campos_ocultos"];

			if (empty($_POST["filtro"])) {
				$filtro=1;
			}else{
				$filtro=$filtro_campo;
			}

			$consulta=str_replace("<<filtro>>",$filtro,$res[0]["consulta"]);

			//echo "<hr>";

			$res_consulta=$conexion->ejecutar_sql($consulta);

			if ($res_consulta->num_rows>0) {
					
				$datos_consulta=$res_consulta->fetch_all(MYSQLI_NUM);
				$datos_columnas=$conexion->ejecutar_sql($consulta);		
				$datos_columnas=$datos_columnas->fetch_all(MYSQLI_ASSOC);	
				$columnas=$datos_columnas[0];

				$value_campos_ocultos=array();

				// INICIO - CREACION DEL HTML DE OPCIONES
				$sql="SELECT * FROM tbl_conf_consultas_opciones WHERE codigo_consulta='".$codigo_consulta."' AND codigo_estado=1";
				$res_opcion=$conexion->ejecutar_sql($sql);
				
				if ($res_opcion->num_rows>0) {
					$datos_consulta_opciones=$res_opcion->fetch_all(MYSQLI_ASSOC);

					$opcion_html="";

						foreach ($datos_consulta_opciones as $value_op) {

							if ($value_op["tipo"]==1) {
								$opcion_html.="<a class='hover' title='".$value_op["titulo"]."' onclick='".$value_op["funcion_ejecutar"]."'><img src='".$value_op["icono"]."' style='width: 30px;'></a>";
							}else{
								$opcion_html.="<a class='hover' title='".$value_op["titulo"]."' onclick='abrir_url(&quot;".$value_op["url"]."&quot;)'><img src='".$value_op["icono"]."' style='width: 30px;'></a>";
							}
						}
				}
				// FIN - CREACION DEL HTML DE OPCIONES

				$tabla="<table class='table table-striped table-responsive'>";

				// INICIO - CREACION DEL HEAD
					$thead="<thead><tr>";
						$i=0;
						foreach ($columnas as $key => $value) {
							if($i>=$res[0]["campos_ocultos"]){
								$thead.="<td>". $key . "</td>";
							}
							$i++;
						}

						if ($opcion==1) {
							$thead.="<td>Opciones</td>";

						}

					$thead.="</tr></thead>";
				// FIN - CREACION DEL HEAD

				// INICIO - CREACION DEL TBODY											
					$tbody="<tbody>";
					$td_opcion="";

						$x=0;
						foreach ($datos_consulta as $value) {
							
							$fila="<tr ";
								if (isset($datos_columnas[$x]["color"])) {
									$fila.="style='background:".$datos_columnas[$x]["color"]."'";
								}
							$fila.=" >";
							
								$i=0;
								foreach ($value as $valor) {
									if ($i < $num_campos_ocultos) {

										$fila.="<input type='hidden' name='oculto".$i."[]' value='".$value[$i]."'>  ";

										//$td_opcion="<td>".$opcion_html."</td>";
										
										$o=0;
										$td_opcion="<td>";
										foreach ($datos_columnas[$x] as $key => $val) {
		
											if ($o < $num_campos_ocultos) {
												//$td_opcion=str_replace("<<".$key.">>",$val,$td_opcion);
												$td_opcion.=$val." - ";
											}
											$o++;	
										}
										$td_opcion.="</td>";			

									}else{
										$fila.="<td>" . $value[$i] ."</td>";
									}
									$i++;
								}
								
							$fila.=$td_opcion;
							$fila.="</tr>";
							$tbody.=$fila;

							$x++;

						}

					$tbody.="</tbody>";
				// FIN - CREACION DEL TBODY

				$tabla.=$thead.$tbody."</table>";
										
				$retorno["resultado"]=1;
				$retorno["mensaje"]=$tabla;

			}else{
				$retorno["resultado"]=0;
				$retorno["mensaje"]="No se encontraron registros de la consulta.";
			}

		}

		echo json_encode($retorno);

	}

	function validar_criterio($criterio_consulta, $reg){

		$co=$criterio_consulta;

		foreach($reg as $campo=>$valor){
			if(!(is_numeric($campo))){
				$co=str_replace($campo, $valor, $co);
			}
		}

		$co=str_replace("=", "==", $co);
		eval("\$res_co=(" . $co . ");");

		if($res_co){
			$sw=1;
		}else{
			$sw=0;									
		}

		return $sw;

	}

?>