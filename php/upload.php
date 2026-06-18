<?php
	
	function registrar_documento($codigo_tipo_padre,$tipo_documento,$codigo_registro,$archivo){
		

		$resultado="";

		$db=new conexion_db();

		$datos_padre=$db->buscar("tbl_conf_docs_padres","codigo_padre='".$codigo_tipo_padre."'");

		if (!empty($datos_padre)) {
			$datos_padre=$datos_padre[0];

			//$path = "/home4/market87/app.mototrabajo.com/archivos_cargados/".$datos_padre["ruta"];
			$path = "/home2/zaguez01/app.mototrabajo.com/archivos_cargados/".$datos_padre["ruta"];

			

			if (!file_exists($path)) {
				mkdir($path, 0777, true);
			}

			$fileName = $archivo['name'];
		    $tmpName  = $archivo['tmp_name'];
		    $fileSize = $archivo['size'];
		    $fileType = $archivo['type'];

		    //$arrayString = explode(".", $fileName); 
			//$extension = $arrayString[1]; 

			$extension = pathinfo($fileName, PATHINFO_EXTENSION);

		    $rutaArchivo=$path."/".$fileName;
		
		    if (move_uploaded_file($tmpName,$rutaArchivo )) {
		    	
		    	$rand=rand(0, 15)*10000;
		    	$nuevoNombre=$codigo_registro.date("Ymdhis").$rand.".".$extension;

		    	//SE CAMBIA EL NOMBRE DEL ARCHIVO
		    	rename($rutaArchivo, $path."/".$nuevoNombre);

		    	//SE REGUISTRA EL ARCHIVO
		    	$campos=array();
		    	$campos["codigo_tipo_padre"]=$codigo_tipo_padre;
		    	$campos["tipo_documento"]=$tipo_documento;
		    	$campos["codigo_padre"]=$codigo_registro;
		    	$campos["nombre"]=$nuevoNombre;
		    	$campos["tipo"]=$extension;

		    	$resultado=$db->insertar("tbl_conf_docs",$campos);

		    	if ($resultado==false) {
		    		$resultado="No se registro el archivo";
		    	}else{
		    		$resultado="Archivo Registrado";
		    	}
				
			}else{
				$resultado="¡No se cargo el archivo!\n";
			}


		}else{
			$resultado="No se encontró definido el padre";
		}

		$db->close();

		return $resultado;


	}

	function UniqueRandomNumbers($min, $max, $quantity) {
    	$numbers = range($min, $max);
    	shuffle($numbers);
    	return array_slice($numbers, 0, $quantity);
	}


?>