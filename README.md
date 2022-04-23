## Petify

Una app para probar las proyecciones, agregados y reactores de Lavaravel event sourcing.

## Motivación del Proyecto

Como no entiendo mucho de los conceptos bancarios y finanzas para una explicación,
adapte el proyecto a una gestión de usuarios con sus mascotas.

Supongamos que tenemos una cadena de servicios y suministros de mascotas,
nos interesa saber quien es un buen dueño para ofrecerle mejores beneficios.

Ademas podemos generar un programa de lealtad o de cuidado de mascotas, entre
muchas otras lineas de negocio que no se me occuren ahora.

## Requerimientos

* PHP 8 o superior
* Composer
* MySQL / MariaDB

## Instalación

1. Copiar el archivo `.env.example` y renombrarlo a `.env`
2. Ajustar los datos correspondientes a la base de datos
   1. Servidor MySQL
3. Instalar las dependencias del proyecto con `composer install`
4. Crear la estructura de base de datos con `php artisan migrate`

## Ejecución de pruebas

Para ejecutar las pruebas unitarias ejecutar el comando `php artisan test`


> NOTA: Los eventos generados en las pruebas no envian datos al exterior,
> solo almacenan las referencias necesarias en las tablas notificaciones.
