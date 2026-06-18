<?php
    // Conexión a la base de datos (reemplaza con tus propios detalles)
    $servername = "localhost";
    $username = "s19ff36e_ukairos";
    $password = "Kairos2026#";
    $dbname = "s19ff36e_kairos";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Obtener el parámetro desde la URL
    $parametro = $_GET['parametro'];
    
    // Llamada al procedimiento almacenado con el parámetro
    $sql = "CALL Eliminar_cobro_extra($parametro)";
    
    $resultado = 0;  // Valor predeterminado en caso de error
    
    /*
    echo "consulta ".$sql;

    if ($conn->query($sql)) {
        // ... (código si la ejecución fue exitosa)

        echo "se ejecuto el codigo";
    } else {
        echo "Error (Número): " . $conn->errno . "<br>";
        echo "Error (Descripción): " . $conn->error;
    }

    */
    
    // Ejecutar la consulta y verificar si hay errores
    if ($conn->multi_query($sql)) {
        do {
            // Obtener el primer conjunto de resultados
            if ($result = $conn->store_result()) {
                // Fetch_assoc solo si hay resultados
                $row = $result->fetch_assoc();
                $resultado = $row['resultado'];
                $result->free(); // Liberar el conjunto de resultados
            }
        } while ($conn->more_results() && $conn->next_result());
    } else {
        // Imprimir detalles del error
        echo "Error al ejecutar la consulta: " . $conn->error;
    }
    
    // Devolver el resultado como JSON
    echo json_encode(['resultado' => $resultado]);
    
    $conn->close();
    ?>