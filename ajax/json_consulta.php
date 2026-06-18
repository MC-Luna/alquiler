<?php
	
	session_start();
	require(dirname(__DIR__)."/conexion/conexion.php");

	$conexion=new conexion_db();

	$res=$conexion->buscar("tbl_conf_consultas","nombre_consulta='".$_POST["consulta"]."'");

	if (empty($res)) {
		$retorno["resultado"]=0;
		$retorno["mensaje"]="No se encontró la consulta!";
	}else{

		if (empty($_POST["filtro"])) {
			$filtro=1;
		}else{
			$filtro=$_POST["filtro"];
		}

		//print_r();

		$consulta=str_replace("<<filtro>>",$filtro,$res[0]["consulta"]);

		$res_consulta=$conexion->ejecutar_sql($consulta);

		if ($res_consulta->num_rows>0) {
				
			$datos_consulta=$res_consulta->fetch_all(MYSQLI_NUM);

			$datos_columnas=$conexion->ejecutar_sql($consulta);		
			$datos_columnas=$datos_columnas->fetch_all(MYSQLI_ASSOC);	
			$columnas=$datos_columnas[0];

			$tabla="<table class='table table-striped display responsive nowrap' width='100%'>";
				$tabla.="<thead><tr>";
					$i=0;
					foreach ($columnas as $key => $value) {
						if($i>=$res[0]["campos_ocultos"]){
							$tabla.="<td>" . $key . "</td>";
						}
						$i++;
					}

					if (isset($_POST["opcion"])) {
						$tabla.="<td>Opciones</td>";
					}

				$tabla.="</tr></thead>";


				$tabla.="<tbody>";
					foreach ($datos_consulta as $value) {

						$tabla.="<tr>";
							$i=0;
							foreach ($value as $valor) {
								if ($i < $res[0]["campos_ocultos"]) {

									$tabla.="<input type='hidden' name='oculto".$i."[]' value='".$value[$i]."'>  ";
								}else{
									$tabla.="<td>" . $value[$i] ."</td>";
								}
								$i++;
							}
							
							if (isset($_POST["opcion"])) {
								$tabla.="<td></td>";
							}
						$tabla.="</tr>";
					}

					
				$tabla.="</tbody>";


			$tabla.="</table>";


	
			$retorno["resultado"]=1;
			$retorno["mensaje"]=$tabla;

		}else{
			$retorno["resultado"]=0;
			$retorno["mensaje"]="No se encontraron registros de la consulta.";
		}

	}

	echo json_encode($retorno);

?>