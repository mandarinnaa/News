<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decodifica el cuerpo de la solicitud (en formato JSON) y lo convierte en un array asociativo
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Obtiene el mensaje del array decodificado. Si no existe, asigna 'Sin mensaje' como valor predeterminado
    $message = $data['message'] ?? 'Sin mensaje';
    
    // Crea una cadena de texto con la fecha y hora actuales, seguida del mensaje recibido
    $log = date('Y-m-d H:i:s') . " - " . $message . "\n";
    
    // Verifica si la constante FILE_APPEND no está definida. Si no lo está, la define con el valor 8
    if (!defined('FILE_APPEND')) {
        define('FILE_APPEND', 8);
    }
    
    // Escribe la cadena de texto en el archivo 'logs.txt', agregándola al final del archivo (FILE_APPEND)
    file_put_contents('logs.txt', $log, FILE_APPEND);
    
    // Envía una respuesta al cliente indicando que el log se ha guardado correctamente
    echo 'Log guardado';
}
?>
\end{code}
