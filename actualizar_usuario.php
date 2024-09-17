<?php
include 'db.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$dinero = $_POST['dinero'];
$apuesta = $_POST['apuesta'];
$eleccion = $_POST['eleccion'];

$sql = "UPDATE jugadores SET nombre='$nombre', dinero=$dinero, apuesta=$apuesta, eleccion='$eleccion' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Jugador actualizado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>