# Laravel

      php artisan serve

## Extensiones VSCode

- Laravel Blade formatter
- Laravel Blade Snippets
- Laravel Snippets
- Laravel goto view
- PHP Intelephense
- Alpine.js IntelliSense

## Laravel Sail

Laravel Sail es una interfaz de línea de comandos para interactuar con el entorno de desarrollo Docker predeterminado de Laravel.

En esencia, Sail es el archivo **docker-compose.yml** y el script **Sail** que se almacena en la raíz de su proyecto. El script Sail proporciona una CLI con métodos convenientes para interactuar con los contenedores **Docker** definidos por el archivo docker-compose.yml.

[Documentación](https://laravel.com/docs/11.x/sail#introduction)

### Instalación de Laravel Sail

      composer require laravel/sail --dev

      php artisan sail:install
      
      ./vendor/bin/sail up

## Artisan

Herramienta de consola, escrita en PHP, que viene con Laravel para ayudarte a realizar tareas cotidianas en tu aplicación de forma automatizada.

      ./vendor/bin/sail up
      
      ./vendor/bin/sail artisan migrate
      
      ./vendor/bin/sail 
      
      ./vendor/bin/sail artisan migrate:fresh --seed
      
      artisan route:list
      
      artisan storage:link

## Xampp

[Tutorial](https://youtu.be/laXc22YPGhg?si=KUCcMlrJVbvKHCTU)

- Instalar
- Correr MySQL y Apache
- Configurar extensión PHP

En la carpeta /etc/php/php.ini o en (/opt/lampp/etc/php.ini):

      uncheck the line extension=pdo_mysql.so



### MySQL is not starting

[Tutorial](https://stackoverflow.com/questions/16830891/mysql-is-not-starting-in-xampp-ubuntu)

[Tutorial 2](https://stackoverflow.com/questions/58511277/very-persistent-opt-lampp-bin-mysql-server-264-kill-no-such-process-xampp-u)

### Comandos

- iniciar xampp en linux: 

      cd /opt/lampp
      sudo ./manager-linux.run (or manager-linux-x64.run)
  
