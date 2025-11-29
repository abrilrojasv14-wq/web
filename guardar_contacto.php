<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Contacto | Proyecto 3RS_RC</title>
</head>
<body>
<?php
// guardar_contacto.php
header('Content-Type: text/plain; charset=utf-8');

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "ecosite_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    http_response_code(500);
    echo "ERROR: Conexión fallida: " . $conn->connect_error;
    exit;
}

// Recibir datos (vienen por fetch -> POST)
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';

if ($nombre === '' || $correo === '') {
    http_response_code(400);
    echo "ERROR: Faltan campos obligatorios.";
    exit;
}

// Preparada (más segura)
$stmt = $conn->prepare("INSERT INTO contactos (nombre, correo, fecha) VALUES (?, ?, NOW())");
if (!$stmt) {
    http_response_code(500);
    echo "ERROR: prepare(): " . $conn->error;
    exit;
}
$stmt->bind_param("ss", $nombre, $correo);

if ($stmt->execute()) {
    echo "OK";
} else {
    http_response_code(500);
    echo "ERROR: execute(): " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
</body>
</html>