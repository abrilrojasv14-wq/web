<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Contacto | Proyecto 3RS_RC</title>
</head>
<body>
    <?php
// guardar_comentario.php

// Recibir datos
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$comentarios = isset($_POST['comentarios']) ? trim($_POST['comentarios']) : '';
$fecha = date("Y-m-d H:i:s");

// Mensaje por defecto
$mensajeFinal = "";

// Guardar comentario solo si el campo no está vacío
if ($comentarios !== '') {
    $ruta = __DIR__ . DIRECTORY_SEPARATOR . "comentarios.txt"; // guarda en misma carpeta
    $ar = fopen($ruta, "a") or die("No se puede abrir/crear comentarios.txt");

    $texto = "Nombre: " . $nombre . "\n";
    $texto .= "Comentario: " . $comentarios . "\n";
    $texto .= "Fecha: " . $fecha . "\n";
    $texto .= "-----------------------------\n";

    fwrite($ar, $texto);
    fclose($ar);

    $mensajeFinal = "Tu comentario ha sido guardado correctamente.";
} else {
    $mensajeFinal = "No se recibió comentario.";
}
?>
<!DOCTYPE html> <html lang="es"> <head> <meta charset="UTF-8"> <title>Gracias</title> <style> body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #c8e6c9, #b3e5fc, #f8bbd0); background-size: 400% 400%; animation: fondoAnimado 10s ease infinite; text-align: center; padding-top: 100px; color: #333; } @keyframes fondoAnimado { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } } h1 { color: #2e7d32; font-size: 2.5em; } p { font-size: 1.2em; margin-bottom: 30px; } button { background-color: #66bb6a; color: white; padding: 10px 25px; border: none; border-radius: 10px; cursor: pointer; font-size: 1em; transition: 0.3s; } button:hover { background-color: #388e3c; } </style> </head> <body>
    <h1>💚 ¡Gracias, <?php echo htmlspecialchars($nombre ?: 'amigo'); ?>! 💚</h1>
    <p><?php echo htmlspecialchars($mensajeFinal); ?></p>
    <p>🌿 Gracias por ser parte del cambio ecológico. 🌍</p>

    <form action="Contactos.html" method="get">
        <button type="submit">⬅️ Regresar a Contacto</button>
    </form>
</body>
</html>

</body>
</html>