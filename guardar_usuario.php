<?php
include 'db.php';

// Verifica si el formulario ha enviado los datos correctos
if (isset($_POST['nombre'], $_POST['dinero'], $_POST['eleccion'])) {
    $nombre = $_POST['nombre'];
    $dinero = $_POST['dinero'];
    $eleccion = $_POST['eleccion'];

    
    $apuesta = 0;

    // Preparar la consulta SQL
    $sql = "INSERT INTO jugadores (nombre, dinero, apuesta, eleccion) VALUES ('$nombre', $dinero, $apuesta, '$eleccion')";

    if ($conn->query($sql) === TRUE) {
        echo "Jugador agregado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Faltan datos del formulario.";
}
?>
