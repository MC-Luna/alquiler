<?php

    require('../cbd.php');
	/*   
	$_POST['modo']=1;
	$_POST['evento']="holaaaaaaaaaaa";
	$_POST['fecha']="2021-05-19 14:00:00";
	    
			*/

    switch ($_POST['modo']) {
	    case 1:
			$sql="INSERT INTO calendario_eventos (descripcion, fecha, duracion) VALUES ('". ucfirst(utf8_decode($_POST['evento'])) ."', '". $_POST['fecha'] . "', '30 MINUTE')";
			
			if(!$result=$db->query($sql)){
				$error_sql=" Consulta= ". $sql . "| Error= " . $db->error;
			}else{
				$codigo_evento=mysqli_insert_id($db);
			}
			
	    	break;
	    case 2:
			$sql="UPDATE calendario_eventos SET fecha='". $_POST['fecha'] ."' where codigo_evento=". $_POST['id']; 
	        
	        if(!$result=$db->query($sql)){
				$error_sql=" Consulta= ". $sql . "| Error= " . $db->error;
			}else{
				$codigo_evento=0;
			}

	        break;
	}

	echo $codigo_evento;
?>
