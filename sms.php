<?php
/*
    $mysql_host="localhost";
    $mysql_database="market87_links"; 
    $mysql_user="market87_links"; 
    $mysql_password="Links2023"; 
	
	$db = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
	
	if($db->connect_errno > 0){
    	die('No se puede conectar [' . $db->connect_error . ']');
	}

    $sql = "SELECT contenido contacto, marca FROM tbl_leads WHERE codigo_lead=". $_POST['lead'];
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $contacto= $row['contacto'];
    $marca= $row['marca'];
    
    date_default_timezone_set('America/Bogota');
    $fecha=date('d-m-Y');
*/
    $contacto="David";
    $marca="mototrabajo";
	//$celular=trim("573014288985");
	//$celular=trim("573005370289");
	
	    //$celular=trim("573003656641");// David
	    //$celular=trim("573016152905"); // Jorge
	    $celular=trim("573005370289"); // Royer--
	
	    //$mensaje="Se le recuerda el pago de la cuota de la moto, sr Jorge, independiente que usted sea el representante legal de mototrabajo";
	    //$mensaje="Se le informa que la deuda de la moto paso a cobro juridico, sr David, no importa que usted sea el ceo de mototrabajo";
	    $mensaje="Albert, ya te tenemos localizado, porfavor devuelve el dinero";
        $mensaje=urlencode($mensaje);
    	
    	$url = "http://api.labsmobile.com/get/send.php?username=ezamora@marketingdigitalideaz.com&password=SbDf41X7KS66&msisdn=".$celular."&message=". $mensaje;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        $result = curl_exec($ch);
        $message = htmlentities('Message has been sent.<br />Details: mmmm' . "<br />" . $result);
        echo $message;

?>