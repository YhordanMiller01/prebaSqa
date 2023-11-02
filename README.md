## Acerca de la prueba
Prueba (Sqa)
Esta es una prueba para realizar un blog utilizando Laravel y Livewire


## Pre-requisitos

1. Php 8.4.* con phpCli habilitado para la ejecución de comando.
2. Mysql
3. Composer
4. Extensión pdo_pgsql habilitada.
5. Node

## Instalación

1. Clonar el repositorio en la carperta del servidor web.
2. por HTTPS git clone https://github.com/YhordanMiller01/prebaSqa.git
3. Por Ssh git clone git@github.com:YhordanMiller01/prebaSqa.git


Instalar paquetes.
composer install
composer require laravel/jetstream
php artisan jetstream:install livewire --teams
npm install && npm run dev


Configurar archivo .env

Configure las variables de entorno para base de datos
1. DB_HOST= Variable de entorno para el host de BD.
2. DB_PORT= Variable de entorno para el puerto de BD.
3. DB_DATABASE= Variable de entorno para el nombre de BD.
4. DB_USERNAME= Variable de entorno para el usuario de BD.
5. DB_PASSWORD= Variable de entorno para la contraseña de BD.

### En la raíz del sitio ejecutar.

1. php artisan key:generate Genera la llave para el cifrado del proyecto.
2. composer install Instala dependencias de PHP
3. php artisan migrate:refresh --seed Ejecuta migraciones y seeders
4. php artisan serve Para correr el proyecto
5. npm run dev 

## Proceso



1. Se pueden crear categorias
2. Se pueden editar categorias
3. Se pueden eliminar categorias
4. Se pueden crear posts
5. Se pueden editar posts
6. Se pueden eliminar posts

## Nota

