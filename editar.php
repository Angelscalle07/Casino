<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM jugadores WHERE id=$id";
$result = $conn->query($sql);
$player = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jugador</title>
<style>

body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    text-align: center;
    color: #333;
}

h1 {
    font-size: 28px;
    color: #2c3e50;
    margin-bottom: 20px;
}

form {
    background-color: #f7f7f7;
    padding: 20px;
    max-width: 400px;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

label {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
    display: block;
}

input[type="text"], input[type="number"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

a {
    display: inline-block;
    margin-top: 20px;
    color: #3498db;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease;
}

a:hover {
    color: #2980b9;
}

    </style>
</head>
<body>
    <h1>Editar Jugador</h1>
    <form action="actualizar_usuario.php" method="post">
        <input type="hidden" name="id" value="<?php echo $player['id']; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $player['nombre']; ?>" required><br>
        <label>Dinero:</label>
        <input type="number" name="dinero" value="<?php echo $player['dinero']; ?>" required><br>
        <label>Apuesta:</label>
        <input type="number" name="apuesta" value="<?php echo $player['apuesta']; ?>"><br>
        <label>Elección:</label>
        <select name="eleccion">
            <option value="Verde" <?php if ($player['eleccion'] == 'Verde') echo 'selected'; ?>>Verde</option>
            <option value="Rojo" <?php if ($player['eleccion'] == 'Rojo') echo 'selected'; ?>>Rojo</option>
            <option value="Negro" <?php if ($player['eleccion'] == 'Negro') echo 'selected'; ?>>Negro</option>
        </select><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index.php">Volver a la lista</a>
</body>
</html>