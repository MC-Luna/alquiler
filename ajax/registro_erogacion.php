<?php
// CONEXION
$servername = "localhost";
$username = "s19ff36e_ukairos";
$password = "Kairos2026#";
$basedate="s19ff36e_kairos";

$conn = new mysqli($servername, $username, $password, $basedate);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SUBIR ARCHIVO
if (!empty($_FILES['archivo']['name'])){
    $nombre_archivo=($_FILES['archivo']['name']);
    $extension = explode(".",$nombre_archivo);
    $num = count($extension)-1;
    $extension = $extension[$num];

    
    // INSERTAR REGISTRO
    $sql='INSERT INTO tbl_erogaciones(archivo, valor, codigo_sede, tipo_documento, identificacion, nombre, concepto, tipo) 
    VALUES (
    "'.$extension.'", 
    "'.$_POST["valor"].'", 
    "'.$_POST['codigo_sede'].'",
    "'.$_POST['tipo_documento'].'",
    "'.$_POST['identificacion'].'",
    "'.$_POST['nombre'].'",
    "'.$_POST['concepto'].'",
    "'.$_POST['tipo'].'"
    )';
 
  if(!$result= $conn->query($sql)){
        die('Ha ocurrido un error en la consult de datos [' . $conn->error . ']');
    }
    $codigo_erogar=$conn->insert_id;

//echo "Este es el codigo pago". $codigo_pago;
    
    //$row = $result->fetch_array(MYSQLI_NUM);
    
    if ($codigo_erogar){
       $nombre_archivo = $codigo_erogar .".". $extension;

//echo "entonces debe generar este nombre". $nombre_archivo;
    }else{
        echo "-1; No existe codigo generado del pago";
    }

//echo __DIR__;
      //echo $_FILES['archivo']['tmp_name']. " ". $nombre_archivo;

$upload_dir = dirname(__DIR__) . "/docs/erogar/";

//echo "el directorio ". $upload_dir;
if (is_dir($upload_dir) && is_writable($upload_dir)) {
    // do upload logic here
} else {
    echo 'Upload directory is not writable, or does not exist.' . dirname(__DIR__);
}

    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $upload_dir . $nombre_archivo)==true){ 
        chmod($nombre_archivo, 0777);
echo "Se ha registrado la erogación con éxito";
    // sql de guardado
    }else{
        //NO SUBIO
        echo "0";
echo "Este es el error ". $_FILES["archivo"]["error"];
    }
}else{

      // INSERTAR REGISTRO
      $sql='INSERT INTO tbl_erogaciones(archivo, valor, codigo_sede, tipo_documento, identificacion, nombre, concepto, tipo) 
      VALUES (
      "'.$extension.'", 
      "'.$_POST["valor"].'", 
      "'.$_POST['codigo_sede'].'",
      "'.$_POST['tipo_documento'].'",
      "'.$_POST['identificacion'].'",
      "'.$_POST['nombre'].'",
      "'.$_POST['concepto'].'",
      "'.$_POST['tipo'].'"
      )';
 
      if(!$result= $conn->query($sql)){
            die('Ha ocurrido un error en la consult de datos [' . $conn->error . ']'.$sql);
        }
        $codigo_erogar=$conn->insert_id;

        echo "Se realizó la erogación sin archivo";
    


}
?>