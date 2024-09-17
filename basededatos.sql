CREATE DATABASE ruleta;
Use ruleta;
CREATE TABLE jugadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    dinero INT NOT NULL,
    apuesta INT DEFAULT 0,
    eleccion ENUM('Verde', 'Rojo', 'Negro')
);


