<?php
include 'db.php';

// Función para determinar el resultado de la ruleta
function girar_ruleta() {
    // 2% Verde, 49% Rojo, 49% Negro
    $random = rand(1, 100);
    if ($random <= 2) {
        return 'Verde';
    } elseif ($random <= 49) {
        return 'Rojo';
    } else {
        return 'Negro';
    }
}

// Obtener el resultado de la ruleta
$resultado_ruleta = girar_ruleta();
echo "<h2>Resultado de la ruleta: $resultado_ruleta</h2>";

// Obtener todos los jugadores con dinero
$sql = "SELECT * FROM jugadores WHERE dinero > 0";
$result = $conn->query($sql);

while ($jugador = $result->fetch_assoc()) {
    $dinero = $jugador['dinero'];
    $eleccion = $jugador['eleccion'];

    // Determinar el monto de la apuesta
    if ($dinero > 1000) {
        // Apuesta entre el 8% y el 15% de su dinero
        $porcentaje = rand(8, 15) / 100;
        $apuesta = round($dinero * $porcentaje);
    } else {
        // Si tiene $1,000 o menos, va All In
        $apuesta = $dinero;
    }

    // Actualizar la cantidad de dinero después de la apuesta
    $nuevo_dinero = $dinero - $apuesta;

    // Calcular las ganancias
    if ($eleccion == $resultado_ruleta) {
        if ($eleccion == 'Verde') {
            $ganancia = $apuesta * 15;
        } else {
            $ganancia = $apuesta * 2;
        }
        $nuevo_dinero += $ganancia; // Sumar las ganancias
        echo "Jugador {$jugador['nombre']} ha acertado su apuesta de $apuesta en $eleccion y ha ganado $ganancia. Le quedan $nuevo_dinero<br>";
    } else {
        echo "Jugador {$jugador['nombre']} ha perdido su apuesta de $apuesta en $eleccion. Le quedan $nuevo_dinero<br>";
    }

    // Actualizar jugador en la base de datos
    $id = $jugador['id'];
    $sql_update = "UPDATE jugadores SET apuesta=$apuesta, dinero=$nuevo_dinero WHERE id=$id";
    $conn->query($sql_update);
}

$conn->close();
?>