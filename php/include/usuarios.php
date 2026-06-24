<?php

include(dirname(dirname(__DIR__))."/php/notificaciones.php");

$email = $trimmed_data['email'];
$nombre = $trimmed_data['nombre'];
$nombre_completo = $trimmed_data['nombre'] . " " . $trimmed_data['apellidos'];

$filtro_update="email = '$email' ";
$password = md5("PMOTO".trim($trimmed_data['identificacion']));
$resultado=$con->actualizar("tbl_usuarios","pass ='$password'",$filtro_update);

	if($resultado){

		$query = " SELECT * FROM tbl_sedes WHERE codigo_sede=". $trimmed_data['codigo_sede'];

		$resultado=$con->ejecutar_sql($query);

		if($resultado->num_rows == 1){
			
			$notificar = new notificaciones();
			$notificar->consulta($email,'notificacion_usuario_nuevo',' where u.email="'.$email.'"');
		}
	}else{
		$txt.="<h2>Ocurrió un error con tu contraseña. Contacta al administrador para restablecerla.</h2>";
	}

	mail($email,$subject,$txt,$headers);
?>