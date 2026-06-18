<?php

	require(dirname(__DIR__)."/conexion/conexion.php");

	$GLOBALS = array(
		'conexion' => new conexion_db()
	);
	
	class usuarios {
		
		protected $conexion;
		
		public function __construct() {
			
			global $GLOBALS;
        	$this->conexion =& $GLOBALS;
    	}
		
		public function login($email,$pass){
			
			if( !empty($email) && !empty($pass) ){
				$con=$this->conexion['conexion'];
				
				//$pass =md5("PMOTO".trim($pass));
				
				$query = " SELECT 
				s.codigo_usuario,
				s.identificacion,
				s.codigo_rol,
				s.codigo_sede,
				s.email
				
				FROM tbl_usuarios s

				where s.identificacion = '$pass' and s.email = '$email' and s.activo=1";

				$resultado=$con->ejecutar_sql($query);

				if($resultado->num_rows == 1){
					
					$resultado=$resultado->fetch_all(MYSQLI_ASSOC);	
					session_start();
					//INICIO LAS VARIABLES DE SESIONES
					$_SESSION["codigo_rol"]=$resultado[0]["codigo_rol"];
					$_SESSION["codigo_sede"]=$resultado[0]["codigo_sede"];
					$_SESSION["email"]=$resultado[0]["email"];
					$_SESSION["codigo_usuario"]=$resultado[0]["codigo_usuario"];

					$retorno["mensaje"]="Ingreso correcto";
					$retorno["resultado"]=1;
					$retorno["codigo_usuario"]=$_SESSION["codigo_usuario"];
					 
				}else{
					$retorno["mensaje"]="Error en el usuario o la contraseña o el usuario se encuentra inactivo.";
					$retorno["resultado"]=0;
				}

				}

		return $retorno;
	}

	public function registrar( array $data ){
		
		if( !empty( $data ) ){
			$con=$this->conexion['conexion'];
			
			$trimmed_data = array_map('trim', $data);
			
			$clave_aleatoria=$this->randomPassword();
			
			$campos=array();
			$campos['email'] = $trimmed_data['email'];
			$campos['nombre'] = $trimmed_data['nombre'];
			$campos['pass'] =md5("PMOTO".trim($clave_aleatoria));
			$campos['codigo_rol'] = $trimmed_data['codigo_rol'];
			$campos['codigo_usuario'] = $trimmed_data['codigo_usuario'];
			
			$resultado=$con->insertar('tbl_cuentas',$campos);
			
			if ($resultado) {
				
				$email = $trimmed_data['email'];
				$nombre = $trimmed_data['nombre'];
				
				$subject = "MotoTrabajo: Hola ". $nombre;
				$txt.="<h1>Bienvenido  ". $nombre. "</h1>";
				$txt.="<p>Ahora perteneces a <b>Mototrabajo</b><br><br>Estas son tus credenciales de ingreso:<br>";

				$txt.="Usuario ". $email. "<br>";
				$txt.="      Contraseña: ". $clave_aleatoria;
				$headers = "From: info@app.mototrabajo.com " . "\r\n" .
				"CC: info@app.mototrabajo.com ";
				
				mail($email,$subject,$txt,$headers);
				
				return "Se ha generado el usuario.";
				
			}else{
				return "No se generó el usuario.";
			}
			
		}else{
			return "No se cargaron los datos.";
		}
	}

	public function forgetPassword($email){
		
		if(!empty($email)){
			$con=$this->conexion['conexion'];
			
			$clave_aleatoria=$this->randomPassword();
			$password = md5("PMOTO".trim($clave_aleatoria));
			
			$query = " SELECT * FROM tbl_usuarios s where s.email = '$email'";
			$resultado=$con->ejecutar_sql($query);

		if($resultado->num_rows == 1){
			
			$resultado=$resultado->fetch_all(MYSQLI_ASSOC);	
			
			$filtro_update="email = '$email' ";
			
			$resultado=$con->actualizar("tbl_usuarios","pass ='$password'",$filtro_update);
			
			if($resultado){
				
				$subject = "MotoTrabajo:  Cambio de Contraseña";
				$txt ="Usuario: ". $email;
				$txt .= "	Contraseña: ". $clave_aleatoria;
				$headers = "From: info@app.mototrabajo.com " . "\r\n" .
				"CC: info@app.mototrabajo.com ";
				
				mail($email,$subject,$txt,$headers);
				
				$retorno["mensaje"]="Contraseña actualizada, fué envida a su correo ". $email ;
				$retorno["resultado"]=1;	
			}else{
				$retorno["mensaje"]="Error al actualizar la contraseña";
				$retorno["resultado"]=0;
			}
			
		}else{
			$retorno["mensaje"]="No se encontró el usuario.";
			$retorno["resultado"]=0;
		}
		}else{
			$retorno["mensaje"]="No se cargó el email.";
			$retorno["resultado"]=0;
		}

		return $retorno;
	}

	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //recuerde que debe declarar $pass como un array
		$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //convertir el array en una cadena
	}

	public function logout(){
			session_start();
			session_unset();	
			session_destroy();
			
			header('Location: login.html');
		}
	}

?>