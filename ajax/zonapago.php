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
if (isset($_FILES['archivo']['name'])){
      $nombre_archivo=($_FILES['archivo']['name']);
    $extension = explode(".",$nombre_archivo);
    $num = count($extension)-1;
    $extension = $extension[$num];

    // INSERTAR REGISTRO
    $sql='INSERT INTO tbl_contrato_pagos(archivo, valor, codigo_contrato) VALUES ("'.$extension.'",'.$_POST["valor"].','.$_POST["codigo_contrato"].')';
 
  if(!$result= $conn->query($sql)){
        die('Ha ocurrido un error en la consult de datos [' . $conn->error . ']');
    }
    $codigo_pago=$conn->insert_id;

//echo "Este es el codigo pago". $codigo_pago;
    
    //$row = $result->fetch_array(MYSQLI_NUM);
    
    if ($codigo_pago){
       $nombre_archivo = $codigo_pago .".". $extension;

//echo "entonces debe generar este nombre". $nombre_archivo;
    }else{
        echo "-1; No existe codigo generado del pago";
    }

//echo __DIR__;
      //echo $_FILES['archivo']['tmp_name']. " ". $nombre_archivo;

$upload_dir = dirname(__DIR__) . "/soporte/";

//echo "el directorio ". $upload_dir;
if (is_dir($upload_dir) && is_writable($upload_dir)) {
    // do upload logic here
} else {
    echo 'Upload directory is not writable, or does not exist.';
}

    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $upload_dir . $nombre_archivo)==true){ 
        chmod($nombre_archivo, 0777);
echo "Se ha registrado su soporte de pago con éxito";
    // sql de guardado
    }else{
        //NO SUBIO
        echo "0";
echo "Este es el error ". $_FILES["archivo"]["error"];
    }

}else{
   // MOSTRAR CONSULTA
        if(isset($_GET['n'])){

            $tipo_documento=$_GET['t'];
            $numero=$_GET['n'];

           $sql='SELECT 
            
            c.codigo_contrato,
            c.valor_pagar AS "Valor",
            CONCAT(cl.nombres, " ", cl.apellidos) AS "Cliente",
            c.valor_pagar,
            cl.celular,
            cl.telefono AS "Telefono", 
            CONCAT (m.marca," ", m.placa) AS "Moto",
            
            sp.saldo as "Saldo",
             c.fecha_proximo_cobro as "Fecha Inicio",
            date_add(c.fecha_proximo_cobro, INTERVAL +c.frecuencia_cobro DAY) as "Fecha Fin"
           
            FROM tbl_contratos c

            INNER JOIN tbl_motos m ON
            m.codigo_moto = c.codigo_moto

            INNER JOIN tbl_clientes cl ON 
            cl.codigo_cliente = c.codigo_cliente
            
            LEFT JOIN tbl_saldo_positivo sp ON
            sp.codigo_contrato=c.codigo_contrato

            WHERE cl.tipo_documento="'. $tipo_documento .'" AND cl.identificacion='.$numero;

            if(!$result= $conn->query($sql)){
                die('Ha ocurrido un error en la consult de datos [' . $conn->error . ']');
            }
            
            $row = $result->fetch_array(MYSQLI_NUM);


             if($row[7] == 0 || $row[7] == ''){
                $saldoPositivo=0;
            }else{
                $saldoPositivo=$row[7];
            }


            /*Hare una query para sacar los datos de tbl_contratos_pagos y verificar si este cliente 
            tiene pagos en ese periodo actual para sumarlo al positivo.*/

            //saco la fecha fin history actual para usarla y buscar si se realizaron pagos en esa fecha para ese ID.

            $fecha_fin_history=$row[8];
            $cod_contrato=$row[0];
            $valor_pago_semanal=$row[1];

            $pagosCiclo=0;

            $sql="SELECT pago_realizado as pago FROM tbl_contrato_pagos WHERE fecha_fin_history="."'".$fecha_fin_history."'"." AND codigo_contrato=".$cod_contrato;
            if(!$result=$conn->query($sql)){ 
                die('Error 18 [' . $db->error . ']');
                $error="Error en realmacenar el positivo ". $db->connect_error;
            }else{
               
                if($result->num_rows > 0){

                    $arrayParaSumar=array();
                    $newData=$result->fetch_all(MYSQLI_ASSOC);
                    foreach($newData as $valores){
                        array_push($arrayParaSumar, $valores['pago']);
                    }

                    $pagosCiclo=array_sum($arrayParaSumar);

                } 
            }

            $saldoFinal=$pagosCiclo + $saldoPositivo;


                echo '<pre>';
                print_r( $pagosCiclo ); 
                echo '</pre>';

                echo '<pre>';
                print_r( $saldoPositivo ); 
                echo '</pre>';
                
                
            $negativo="";
            if($saldoFinal != 0 && $saldoFinal < $valor_pago_semanal){
                $saldoFinal=$valor_pago_semanal - $saldoFinal;
                $negativo="-";
            }


            


            echo '<form id="enviar-archivo" action="https://mototrabajo.com/zona-de-pagos/" class="elementor-form" method="post" enctype="multipart/form-data">

                <div>
                 <b>Cliente : </b> '.  $row[2] .'<br>
                 <b>Valor :</b> '. number_format($valor_pago_semanal,0,'','.') .'<br>
                 <b>Saldo :</b> '.$negativo. number_format($saldoFinal,0,'','.') .'<br>
                 <b>Ciclo :</b> '.  $row[8] .'<b> - </b>'.$row[9].'<br>
                <b>Moto :</b> '.  $row[6] .'<br>
                <input name="valor" type="hidden" value="'.$row[3].'"/>
                <input name="codigo_contrato" type="hidden" value="'.$row[0].'"/>
                </div>

                <label for="form-field-message" class="elementor-field-label">
                Sube aquí tu soporte de pago
                </label>
                <input type="file" name="archivo" id="archivo" >

                <div>
                <input type="submit" value="Enviar Archivo"/>			
                </div>
            </form>';
          
        }else{

                   // FORMULARIO DE CONSULTA
        echo '<form class="elementor-form" method="get"  Action="https://mototrabajo.com/zona-de-pagos/" name="New Form">
                                   
                <div class="elementor-form-fields-wrapper elementor-labels-above">
                   <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-name elementor-col-50 elementor-field-required">
                        <div class="elementor-field elementor-select-wrapper ">
                
                        <select name="t" id="form-field-name" class="elementor-field-textual elementor-size-lg" required="required" aria-required="true">
                        <option value="Seleccione tipo de documento">Seleccione tipo de documento</option><option value="CC">Cedula de ciudadanía</option><option value="EX">Cedula de Extranjería</option><option value="PA">Pasaporte</option></select>
                        </div>
                            
                        </div>
                            <div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_65ac13a elementor-col-50 elementor-field-required">
                            <input type="number" name="n" id="form-field-field_65ac13a" class="elementor-field elementor-size-lg  elementor-field-textual" placeholder="Numero de documento" required="required" aria-required="true" min="" max=""></div>
                                    <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                        <button type="submit" class="elementor-button elementor-size-sm">
                            <span>
                                                                <span class=" elementor-button-icon">
                                                                                                            </span>
                                                                                            <span class="elementor-button-text">CONSULTAR</span>
                                                        </span>
                        </button>
                    </div>
                </div>
            </form>';

        }

}