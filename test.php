<?php
// Destinatario
$para = "jorgemario.com@gmail.com"; // Cambia esto por tu correo real

// Asunto
$asunto = "Prueba de la función mail en PHP";

// Mensaje
$mensaje = "Este es un correo de prueba para verificar que la función mail() está funcionando correctamente.";

// Cabeceras adicionales
$cabeceras = "From: webmaster@tudominio.com" . "\r\n";
$cabeceras .= "Reply-To: webmaster@tudominio.com" . "\r\n";

// Intentar enviar el correo
$resultado = mail($para, $asunto, $mensaje, $cabeceras);

// Mostrar el resultado
if ($resultado) {
    echo "El correo de prueba ha sido enviado. Revisa tu bandeja de entrada (y la carpeta de spam).";
} else {
    echo "Error: No se pudo enviar el correo.";
    
    // Información adicional para depuración
    echo "<br><br>Información de error:<br>";
    echo "- PHP version: " . phpversion() . "<br>";
    
    // Verificar si sendmail está instalado (en sistemas Unix/Linux)
    if (function_exists('exec')) {
        echo "- Sendmail path: " . ini_get('sendmail_path') . "<br>";
        
        // Comprobar si el binario de sendmail existe
        exec('which sendmail 2>&1', $output, $return_var);
        echo "- Sendmail binary: " . ($return_var == 0 ? "Encontrado" : "No encontrado") . "<br>";
    }
    
    // Verificar si la función mail está deshabilitada
    if (function_exists('ini_get')) {
        $disabled_functions = ini_get('disable_functions');
        echo "- mail() está " . (strpos($disabled_functions, 'mail') !== false ? "deshabilitada" : "habilitada") . " en php.ini<br>";
    }
}
?>