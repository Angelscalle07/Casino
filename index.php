<?php
include 'db.php';

$sql = "SELECT * FROM jugadores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ruleta Casino</title>
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    text-align: center;
    color: #333;
}

h1, h2 {
    color: #2c3e50;
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #ecf0f1;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: center;
}

table th {
    background-color: #3498db;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #dfe6e9;
    cursor: pointer;
}

a {
    text-decoration: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    margin: 10px;
    transition: background-color 0.3s ease;
}

a.simular {
    background-color: #e67e22;
}

a.simular:hover {
    background-color: #d35400;
}

a.agregar {
    background-color: #2ecc71;
}

a.agregar:hover {
    background-color: #27ae60;
}

a.editar {
    background-color: #2c3e50;
    padding: 8px 15px;
}

a.eliminar {
    background-color: #2c3e50;
    padding: 8px 15px;
}

a.editar:hover, a.eliminar:hover {
    opacity: 0.8;
}

.confirm-message {
    margin: 20px 0;
    padding: 15px;
    background-color: #f39c12;
    color: white;
    border-radius: 5px;
}

footer {
    margin-top: 40px;
    padding: 10px;
    background-color: #3498db;
    color: white;
    position: relative;
    bottom: 0;
    width: 100%;
    text-align: center;
    border-top: 2px solid #2980b9;
}
</style>
</head>
<body>
    <h1>Bienvenido al Juego de la Ruleta</h1>

    <a href="simulacion.php"class="simular">Simular Ronda</a>

    <h2>Jugadores</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dinero</th>
            <th>Apuesta</th>
            <th>Elección</th>
            <th>Acciones</th>
        </tr>

        <?php while($jugador = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $jugador['id']; ?></td>
            <td><?php echo $jugador['nombre']; ?></td>
            <td><?php echo $jugador['dinero']; ?></td>
            <td><?php echo $jugador['apuesta']; ?></td>
            <td><?php echo $jugador['eleccion']; ?></td>
            <td>
                <a class="editar"href="editar.php?id=<?php echo $jugador['id']; ?>">Editar</a>
                <a class="eliminar"href="eliminar.php?id=<?php echo $jugador['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este jugador?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="agregar.php"class="agregar">Agregar Jugador</a>

    <?php $conn->close(); ?>
</body>
</html>
