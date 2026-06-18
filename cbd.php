<?Php

	$mysql_host="localhost";
	$mysql_database="pruebaag_app";
	$mysql_user="pruebaag_app";
	$mysql_password="#knvD%06%!";
	
	$db = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
	
	if($db->connect_errno > 0){
    	die('Unable to connect to database [' . $db->connect_error . ']');
	}

	$sql="SET time_zone = '-5:00'";
	if(!$result= $db->query($sql)){
		die('Error en consulta de time zone [' . $db->error . ']');
	}
	
?>