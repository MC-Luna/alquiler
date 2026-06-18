<?php
set_time_limit(0);

require(dirname(__DIR__)."/conexion/conexion.php");
require(dirname(__DIR__)."/php/upload.php");

$conexion=new conexion_db();

$tipo_documentos=array();
$tipo_documentos[0]=1;
$tipo_documentos[1]=2;
$tipo_documentos[2]=3;
$tipo_documentos[3]=4;

// INSERTAR REGISTRO
$sql='INSERT INTO tbl_clientes( tipo_documento,identificacion,expedida,fecha_nacimiento,nombres,apellidos,
direccion,celular,telefono,correo,facebook,twitter,instagram,tiktok,vivienda_tipo,vivienda_tiempo,uso_moto,
origen_lead,codigo_origen_lead,codigo_estado, proceso_leads) ';
$sql.='VALUES (';
$sql.='"'. $_POST["tipo_documento"] .'",';
$sql.='"'. $_POST["identificacion"] .'",';
$sql.='"'. $_POST["expedida"] .'",';
$sql.='"'. $_POST["fecha_nacimiento"] .'",';
$sql.='"'. $_POST["nombres"] .'",';
$sql.='"'. $_POST["apellidos"] .'",';
$sql.='"'. $_POST["tipo_direccion"] .' '. $_POST["direccion_no"] .' '. $_POST["direccion_nomen"] .' '. $_POST["barrio"] .'",';
$sql.='"'. $_POST["celular"] .'",';
$sql.='"'. $_POST["telefono"] .'",';
$sql.='"'. $_POST["correo"] .'",';
$sql.='"'. $_POST["facebook"] .'",';
$sql.='"'. $_POST["twitter"] .'",';
$sql.='"'. $_POST["instagram"] .'",';
$sql.='"'. $_POST["tiktok"] .'",';
$sql.='"'. $_POST["vivienda_tipo"] .'",';
$sql.='"'. $_POST["vivienda_tiempo"] .'",';
$sql.='"'. $_POST["uso_moto"] .'",';
$sql.='1,';
$sql.='1,';
$sql.='2,';
$sql.='0)';


if(!$result= $conexion->ejecutar_sql($sql)){
    die('Ha ocurrido un error en la consult de datos [' . $conexion->error() . ']');
}else{
    $codigo_cliente=$conexion->insert_id();


    $i=0;
    foreach ($_FILES as $file) {
        if ( $file["name"] != "") {

          registrar_documento(1,$tipo_documentos[$i],$codigo_cliente,$file);       
        } 
      $i++;
    }
   
    
    /*
    
      $sql_contrato='INSERT INTO tbl_contratos(fecha_inicio_contrato,fecha_final_contrato,fecha_proximo_cobro,frecuencia_cobro,valor_pagar,codigo_moto,codigo_cliente) ';
      $sql_contrato.='VALUES ("'.$_POST["fechainicio"].'","'.$_POST["fechafinal"].'","'.$_POST["proximocobro"].'","'.$_POST["frecuencia"].'","'.$_POST["valor"].'","'.$_POST["codigo_moto"].'","'.$codigo_cliente.'")';

      if(!$result= $conn->query($sql_contrato)){
        die('Ha ocurrido un error en la consulta del contrato [' . $conn->error . ']');
      }else{
        echo "Se realizó registro del cliente ". $codigo_cliente;
      }
   
      $changeEstadoMoto=$conexion->cambiar_estado_moto($_POST["codigo_moto"], $estado=1);
      
      if(!$changeEstadoMoto){
        die('Error al actualizar el estado de la moto');
      }

    */

      $sql_seguridad='INSERT INTO tbl_seguridad_clientes SET codigo_cliente='.$codigo_cliente;

      if(!$result= $conexion->ejecutar_sql($sql_seguridad)){
        die('Ha ocurrido un error en la consulta del contrato [' . $conexion->error() . ']');
      }else{
        echo "Se realizó registro del cliente ". $codigo_cliente;
      }
}
        

?>