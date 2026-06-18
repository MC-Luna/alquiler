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
		$res_consulta_forArray=$conexion->ejecutar_sql($consulta);

		
		$arrListados=array('listado_pagos', 'listado_contratos','listado_leads_nuevo');

		if ($res_consulta->num_rows>0) {
				
			/*
			$idForTbody="";
			if($_POST['consulta'] == "listado_clientes"){
				$idForTbody="tBodyListadoConsulta";
			}
			*/


			$datos_consulta=$res_consulta->fetch_all(MYSQLI_NUM);
			$datos_consultaArrayAssoc=$res_consulta_forArray->fetch_all(MYSQLI_ASSOC);
			
			$retorno['dataInfo'] = $datos_consultaArrayAssoc;
			$retorno['dataConsultaSimple'] = $datos_consulta;
			$retorno['sql'] = $consulta;
			$retorno['opcion'] = $_POST['opcion'];
			$retorno['session'] = $_SESSION;

			$datos_columnas=$conexion->ejecutar_sql($consulta);		
			$datos_columnas=$datos_columnas->fetch_all(MYSQLI_ASSOC);	

			$columnas=$datos_columnas[0];

			$retorno['columnas'] = $columnas;
			$sw_color=0;
			$icon="";

			$columnasOmitir=[
				'activo_moto', 'codigo_moto', 
				'cod contrato_pago', 
				'pagos_numero_soporte',
				'pagos_archivo',
				'nombre_usuario',
				'IDEMPLEADO',
				'disponible_leads',
			];

			$tabla="<table class='table table-striped display responsive nowrap' width='100%'>";
				$tabla.="<thead><tr>";
					$i=0;

					foreach ($columnas as $key => $value) {

						if($key=="color"){
							$sw_color=1;
							$indice_color=$i;
						}

						if($i>=$res[0]["campos_ocultos"]){

							if(in_array($key, $columnasOmitir) != true ){

								if($key=="color" && $_POST['consulta'] == "listado_contratos"){

								}else{
									$tabla.="<td>" . $key . "</td>";
								}
								
							}



						}
						$i++;
					}

					//la omito en listado_pagos porque hare otra condicional que valide por rol tambien.
					if (
					isset($_POST["opcion"]) && 
					!in_array($_POST['consulta'], $arrListados)){
						$tabla.="<td>Acciones</td>";
					}

					//En esta valido el ROL en las acciones de listado_pagos.

					if(isset($_POST["opcion"]) && 
						$_SESSION["codigo_rol"]==1 &&
						$_POST['consulta'] == "listado_pagos"
					){
						$tabla.="<td>Acciones</td>";
					 }

				$tabla.="</tr></thead>";
		//Crear una query que me traiga solo los id con num y uso el forEeach que genera las filas para iterarlo.

			if($_POST['consulta'] == "listado_clientes"){
				$icon='<i style="pointer-events: none" class="fa fa-user"></i>';
				$perfil='perfilUser';

			}else if($_POST['consulta'] == "listado_motos"){
				$icon='<i style="pointer-events: none" class="fa fa-motorcycle"></i>';
				$perfil='perfilMoto';

			}else if($_POST['consulta'] == "listado_leads_nuevo"){
				$icon='<i style="pointer-events: none" class="fa fa-user"></i>';
				$perfil='perfilUser';

			}
			
			//Creo un array de los listado que no quiero que se creen de la manera antigua sino con array assoc.

			/* El man que estaba antes que yo se lo ocurrio la grandisima idea de traer html desde la bd
			cagandome la vida por completo y haciendo que tenga que hacer todo esto para poder modificar una 
			simple tabla
			@jesus
			*/

			//omito los listados que voy a personalizar.

			$cID=0;

				$tabla.="<tbody id='".$idForTbody."'>";

				$p=0;
					foreach ($datos_consulta as $value) {

						$tabla.="<tr class='item' ";
											
							$i=0;
							
							$td="";

							foreach ($value as $valor) {

								if(!in_array($_POST['consulta'], $arrListados)){

									if ($i < $res[0]["campos_ocultos"]) {

										if($sw_color){
											$tabla.=" style='background-color:#". $value[$indice_color] . "'";
										}
										
										$td.="<input type='hidden' name='oculto".$i."[]' value='".$value[$i]."'>";
									}else{
										$td.="<td>" . $value[$i]."</td>";
									}
	
								}else if($_POST['consulta'] == "listado_contratos"){

									/*Cuando la consulta venga de listado_contratos entro en este if 
									y cambio el i = 1 que es donde viene la columna activo*/

									/*OmitirData es para omitir ciertos valores que me traigo y no quiero mostrar en la tabla */
									/* Que en este caso es el codigo de la moto y el activo*/
									$omitirData=[2,3,4];

										$tabla.=" style='background-color:#". $datos_consultaArrayAssoc[$cID]['color'] . "'";
									
									if($i == 1){

										if($datos_consultaArrayAssoc[$cID]['activo_moto'] == '1'){

											$td .= "<td>
												<input type='checkbox' id='cbox2' 
												value='" . $datos_consultaArrayAssoc[$cID]['Activo']. "' data-codmoto='".
												$datos_consultaArrayAssoc[$cID]['codigo_moto']."'"."checked"."/>
											</td>";
											
											
										}else{
											$td .= '<td> </td>';
										}

									}else if(in_array($i, $omitirData) != true){
										$td .= "<td>" . $value[$i]."</td>";
									}
						
								}
	
								$i++;

							}
							
							if($_POST['consulta'] == "listado_pagos"){

								$icon="<i class='fa fa-trash' aria-hidden='true'></i>";

								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Contrato'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Fecha'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Forma de Pago'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Valor'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Pago Realizado'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Saldo'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Soporte Pago'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Fecha Inicio'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Fecha Fin'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['Observaciones'].'</td>';


								if($_SESSION["codigo_rol"]==1){

									if($datos_consultaArrayAssoc[$cID]['pagos_numero_soporte'] == null){
										$td .= '
										<td>
											<button class="btn btn-success" id="deletePago" 
											value="'.$datos_consultaArrayAssoc[$cID]['cod contrato_pago'].'"
											onClick=eliminarPago('.$datos_consultaArrayAssoc[$cID]['cod contrato_pago'].')>'.$icon.'</button>
										</td>';
	
									}else{
										$td .= '<td><i class="fa fa-check"></i> Validado';
										if ($p==0){

											$td .= '<button class="btn btn-success" title="Reversar pago"  onclick="fn_reversar_pago('.$datos_consultaArrayAssoc[$cID]['cod contrato_pago'].')">';
											$td .= '<i style="pointer-events: none" class="fa fa-clock-rotate-left"></i></button>';
										}
										$td .= '</td>';
									}
									

								}

								$p++;
							}

							if($_POST['consulta'] == "listado_leads_nuevo"){

								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['ID'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['NOMBRE'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['APELLIDO'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['CIUDAD'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['TELEFONO'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['CORREO'].'</td>';
								$td .= '<td>'.$datos_consultaArrayAssoc[$cID]['FECHA'].'</td>';

								$FaseActual="";
								$FaseActualNUM=$datos_consultaArrayAssoc[$cID]['ESTADO'];
								$nombres_usuario=$datos_consultaArrayAssoc[$cID]['nombre_usuario'];	
								$id_empleado=$datos_consultaArrayAssoc[$cID]['IDEMPLEADO'];	

								if($datos_consultaArrayAssoc[$cID]['disponible_leads'] == 0){
									$FaseActual="Disponible";
									
								}else{
									$FaseActual="<b>FASE</b> ".$FaseActualNUM." - ". $nombres_usuario;
								}

								if($_SESSION['codigo_usuario'] == $id_empleado || $datos_consultaArrayAssoc[$cID]['disponible_leads'] == 0){
									$td .= 
									'<td>'.
										'<a href="javascript:void(0);" 
										onClick="ChangeEstadoLeds('.$_SESSION['codigo_usuario'].','.$FaseActualNUM.','.$datos_consultaArrayAssoc[$cID]['ID'].','.$datos_consultaArrayAssoc[$cID]['disponible_leads'].')" >'.
										$FaseActual.'</a>'.
									'</td>';
								}else{

									$td.='<td>'.$FaseActual.'</td>';
								}
								

							}

							
							//Uso pointer-events:none para quitar el evento del raton al icono y asi funcione el raton con el botton.


							if (isset($_POST["opcion"]) && !in_array($_POST['consulta'], $arrListados)) {
								$td.='<td class="text-dark">
								<h3>
									<button class="btn btn-success" id="'.$perfil.'" value="'.$datos_consultaArrayAssoc[$cID]['ID'].'">'.$icon.'</button>
								</h3>
								</td>';
							}

							
						$tabla.=" >". $td."</tr>";
						$cID++;
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