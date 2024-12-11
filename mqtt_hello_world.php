<?php
// Incluye la librería phpMQTT
require_once('vendor/autoload.php');
use Bluerhinos\phpMQTT;

// Dirección del servidor MQTT
$server = 'broker.hivemq.com';  // Usando HiveMQ como broker MQTT
$port = 1883;                   // Puerto estándar MQTT
$username = '';                 // Deja vacío si no se necesita autenticación
$password = '';                 // Deja vacío si no se necesita autenticación
$client_id = 'phpMQTTClient';    // ID único para el cliente

// Crear la instancia del cliente MQTT
$mqtt = new phpMQTT($server, $port, $client_id);

// Conectar al servidor MQTT
if (!$mqtt->connect(true, NULL, $username, $password)) {
    exit('No se pudo conectar al servidor MQTT');
}

// Publicar un mensaje "Hola Mundo" en el tema "test/helloworld"
$topic = 'test/helloworld';
$message = 'Hola Mundo desde PHP y MQTT';
$mqtt->publish($topic, $message, 0);

// Mostrar mensaje publicado
echo "Mensaje publicado: $message\n";

// Función de callback para manejar los mensajes entrantes
function messageReceived($topic, $msg) {
    echo "Mensaje recibido en el tema '$topic': $msg\n";
}

// Suscribirse al tema "test/helloworld" y manejar mensajes recibidos
$mqtt->subscribe([$topic => ['qos' => 0, 'function' => 'messageReceived']]);

// Mantener la conexión activa manualmente (sin usar loop())
while ($mqtt->proc()) {
    // Esto mantiene el bucle activo para escuchar mensajes
}

// Cerrar la conexión al finalizar
$mqtt->close();
