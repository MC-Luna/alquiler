<?php
session_start();

	class conexion_db {

		private $host="localhost";
    	private $usuario="TU_USUARIO_DB";
    	private $clave="TU_CLAVE_DB";
    	private $db="TU_BASE_DE_DATOS";
		private $conexion;

		function __construct(){

			$this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db);


	        if($this->conexion->connect_errno){
	        	echo "Fallo al conectar a MySQL: " .$this->conexion->connect_error;

	        }else{
	        	$this->conexion->set_charset("utf8");
	        }

		}

		public function ejecutar_sql($sql){

	        $resultado = $this->conexion->query($sql) or die($this->conexion->error);

	        if($resultado)
	            return $resultado;
	        return false;
    	}

		public function buscar($tabla, $condicion){

			if ($condicion=="") {
				$condicion=1;
			}

	        $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
	        if($resultado)
	            return $resultado->fetch_all(MYSQLI_ASSOC);
	        return false;
    	}

    	public function insertar($tabla, $datos){

    		$campos="";
    		$valores="";

    		$i=0;
    		foreach ($datos as $key => $value) {

    			$coma= $i<count($datos)-1 ? ',' : '';

    			$campos.=$key;
    			$campos.=$coma ;

    			$valores.="'" . $value ."'";
    			$valores.=$coma;

    			$i++;
    		}

    		$sql="INSERT INTO " . $tabla ;
    		$sql.="(".$campos.")";
    		$sql.=" VALUES (".$valores.")";

        	$resultado = $this->conexion->query($sql) or die($this->conexion->error);
        	if($resultado)
				$codigo_nuevo= $this->conexion->insert_id;

					if($codigo_nuevo){
						$accion="Realizo un registro ";
						$tabla_log=substr($tabla, 4);

						$sql_log="INSERT INTO tbl_logs (codigo_usuario,accion,tabla,codigo) VALUES (";
						$sql_log.=$_SESSION["codigo_usuario"].",";
						$sql_log.="'".$accion."',";
						$sql_log.="'".$tabla_log."',";
						$sql_log.=$codigo_nuevo.")";

						$resultado_log = $this->conexion->query($sql_log) or die($this->conexion->error);
					}

				return $codigo_nuevo;

        	return false;
    	}

    	public function actualizar($tabla, $campos, $condicion){
    		$sql="UPDATE $tabla SET $campos WHERE $condicion";

	        $resultado = $this->conexion->query($sql) or die($this->conexion->error);
	        if($resultado)
	            return true;
	        return false;
    	}

    	public function borrar($tabla, $condicion){

    		if ($condicion=="") {
    			return "Debe agregar una condición.";
    		}else{
	        	$resultado = $this->conexion->query("DELETE FROM $tabla WHERE $condicion") or die($this->conexion->error);
	        	if($resultado)
	            	return true;
	        	return false;
    		}

    	}

    	public function listado_select($tabla,$valor,$etiqueta,$filtro){
			$sql="select ".$valor.", ".$etiqueta." from ".$tabla." ".$filtro;
			$resultado=$this->conexion->query($sql);

			if($resultado->num_rows > 0){
				$num=0;
				while($row = $resultado->fetch_array(MYSQLI_NUM)){

					$data[$num][$valor] = $row[0];
					$data[$num][$etiqueta] = $row[1];
					$num++;
				}
			}else{
				$data = '0';
			}

			return $data;
    	}

    	public function consultar_campo($tabla,$nombre_campo,$filtro){
    		$data="";

			$filtro = str_replace("\\", "", $filtro);
			$sql = "SELECT ".$nombre_campo." FROM ".$tabla." WHERE ".$filtro;

			$resultado=$this->conexion->query($sql);

			if($resultado->num_rows > 0){
				$data=$resultado->fetch_array(MYSQLI_NUM);
			}else{
				$data=0;
			}

			return $data;
    	}

	}

?>
