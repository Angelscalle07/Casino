## Ruleta Simulación
Este proyecto es una aplicación web que simula un juego de ruleta con un grupo de jugadores que apuestan automáticamente en cada ronda. Los jugadores eligen entre tres opciones: Verde, Rojo y Negro, con probabilidades de 2%, 49% y 49%, respectivamente. El sistema gestiona el dinero de los jugadores, sus apuestas y los resultados de cada ronda.

## Características
Los jugadores inician con un monto predeterminado de $10,000.
En cada ronda, los jugadores apuestan entre el 8% y 15% del dinero que tienen. Si tienen $1,000 o menos, van "All In".
Las apuestas pueden ser a Verde (2% de probabilidad), Rojo (49% de probabilidad) o Negro (49% de probabilidad).
Si un jugador acierta Rojo o Negro, gana el doble de su apuesta. Si acierta Verde, gana 15 veces su apuesta.
Se pueden agregar, editar o eliminar jugadores mediante un sistema CRUD (Crear, Leer, Actualizar, Eliminar).
Los jugadores agregan el dinero que quieran invertir al editar el usuario. 
Cada vez que se recarga la página, se ejecuta una nueva ronda automáticamente.
Lenguajes Utilizados
El proyecto fue desarrollado íntegramente en PHP con las siguientes tecnologías:

-PHP para la lógica del servidor.
-MySQL para la base de datos.
-HTML y CSS para la presentación de las vistas.
-Apache (XAMPP) como servidor web.

## Creación de la Base de Datos
Ejecutar las siguientes consultas en MySQL para crear la base de datos.
Se encuentra en el archivo basededatos.sql (Base de datos creada en mysql workbench).

## Instrucciones para Desplegar en un Sistema Unix
Requisitos
Asegúrate de tener los siguientes componentes instalados en tu sistema Unix (Linux o MacOS):
-Servidor Apache con soporte para PHP.
-PHP.
-MySQL
-Git.

## Pasos de Instalación
1.Clonar el Repositorio
Clona el repositorio desde GitHub a tu servidor Unix:

git clone  https://github.com/Angelscalle07/Casino.git
cd Casino

2.Configurar la Base de Datos
Acceder a MySQL y crear la base de datos y la tabla de jugadores usando las siguientes consultas SQL que se encuentran en el archivo basededatos.sql.

3.Mover el Proyecto a Apache
Mover el directorio del proyecto a la carpeta de Apache (/var/www/html/):

sudo mv Casino /var/www/html/Casino

4.Configurar Permisos
Ajustar los permisos del directorio del proyecto:

sudo chown -R www-data:www-data /var/www/html/Casino
sudo chmod -R 755 /var/www/html/Casino

5.Configurar la Conexión a la Base de Datos
Editar el archivo db.php en la raíz del proyecto y ajustar los parámetros de conexión a la base de datos:

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ruleta";

6.Reiniciar Apache
Reinicia el servidor Apache para aplicar los cambios:

sudo systemctl restart apache2

7.Acceder a la Aplicación
En el navegador web, accede a http://localhost/Casino para interactuar con el sistema de simulación de ruleta.

