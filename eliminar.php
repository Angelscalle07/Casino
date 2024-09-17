<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM jugadores WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Jugador eliminado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>