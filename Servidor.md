# PHP
## Acceso a base de datos

Desde una página con código escrito en PHP nos podemos conectar a una base de datos y
ejecutar comandos en lenguaje SQL - para hacer consultas, insertar o modificar registros, crear
tablas, dar permisos, etc.

### PDO 
Las principales APIs que PHP ofrece para utilizar MySQL son:
- Mysql (anticuada)
- Mysqli (mejora de MySql)
- PDO

PDO proporciona una capa de abstracción de tal forma que los métodos utilizados para acceder a los datos son independientes del sistema gestor de bases de datos utilizado. En la práctica, permite cambiar de SGBD sin cambiar el código PHP.

#### Código para conectarse a la BD con PDO (ejemplo de clase)
    `<?php

    $servidor="db"; // nombre del contenedor 

    $usuario="user";

    $clave= "pestillo";

    $bd="protectora";

    try {

      // mysql es el gestor de Base de datos

      $conn = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $clave);

      // Establece los atributos de los reportes de errores

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      echo "Conexión satisfactoria";

    }

    catch(PDOException $e)

    {

      echo ( "Error de conexión: " . $e->getMessage());

    }

    ?>`

Este es un código para copiar y pegar. Reutilizable.
En este código modificamos los valores de:
- `$servidor`
- `$usuario`
- `$clave`
- `$bd`

. . .

# DOCKER
La finalidad de Docker es la contenerización de aplicaciones. Desplegar aplicaciones autocontenidas.

**Programa autocontenido**

Un programa autocontenido ya tiene todos los datos necesarios para ejecutarse correctamente. Puede ejecutarse en cualquier máquina.

**Máquina virtual**

Para entender como funciona un contenedor conviene saber como funciona una máquina virtual.

Es un software capaz de cargar en su interior otro sistema operativo.
Aparte de la aplicación que se quiere desplegar, se añaden muchos ficheros que necesita el sistema operativo (SO) para funcionar (drivers del hardware…), lo cual implica un gran gasto de recursos.

## Contenedor
Es un método de virtualización de nivel de sistema operativo para implementar y ejecutar aplicaciones sin lanzar una máquina virtual completa para cada aplicación.

Los contenedores de aplicaciones contienen los componentes, como archivos, variables de entorno y bibliotecas, necesarios para ejecutar el software deseado.  Se pueden crear contenedores de aplicaciones que ponen menos presión a los recursos globales disponibles.

### Imagen de un contenedor
**Docker inicia un contenedor a partir de una imagen.**

Una imagen es una representación estática de la aplicación o el servicio y de su configuración y las dependencias.

**Contenido de la imagen:**
- El sistema operativo y su distribución (Ubuntu, Debian, Fedora…)
- Software. Paquetes, librerías,… (Dependencias)
- Las aplicaciones. El código.

Las imágenes pueden crearse (Dockerfile) o descargarse (registro).

#### Crear una imagen. Dockerfile.

Dockerfile es un archivo que contiene una serie de instrucciones que indican cómo crear una imagen.

Ejemplo:

    FROM ubuntu:18.04
    COPY . /app
    RUN make /app
    CMD python /app/app.py
    . . .
    
**Comando para crear la imagen a partir del Dockerfile:**

    docker build
    
#### Descargar una imagen. Registro de imágenes

Los desarrolladores deben almacenar las imágenes en un registro, que actúa como una biblioteca de imágenes. Docker mantiene un registro público a través de [Docker Hub](https://hub.docker.com/); otros proveedores ofrecen registros para distintas colecciones de imágenes, incluido Azure Container Registry. Como alternativa, las empresas pueden tener un registro privado local para sus propias imágenes de Docker.

**Comando:**

      docker pull <nombre_imagen>

#### Iniciar un contenedor

     docker run <nombre_imagen>

## DOCKER COMPOSE
Compose es una herramienta para definir y ejecutar aplicaciones Docker de varios contenedores. Con Compose, se utiliza un archivo YAML (.yml) para configurar los servicios de su aplicación. Luego, con un solo comando, crea e inicia todos los servicios desde su configuración (**compose up**).

Ejemplo de un archivo docker-compose.yml:
    
    Version: "3.7"

    services:

        server:

            image: fjortegan/nginx-fpm

            ports:

            - "80:80"

            volumes:

            - ./codigophp:/usr/share/nginx/html

            links:

            - fpm

        fpm:

            image: fjortegan/php-xdebug

            volumes:

            - ./codigophp:/var/www/html

            \# Sólo en máquinas Linux, comentar estas dos líneas en otros sistemas de lusers

            extra_hosts:

            - "host.docker.internal:host-gateway"

        db:

          image: mariadb \#MariaDB es un sistema de gestión de bases de datos derivado de MySQL

          volumes:

          - ./db-data:/var/lib/mysql/

          environment:

          MYSQL_ROOT_PASSWORD: pestillo


        phpmyadmin:

          image: phpmyadmin

          ports:

          - "8080:80"

          environment:

          - PMA_ARBITRARY=1

    
Cada uno de los `servicices` es un contenedor:
- `server`
- `fpm`
- `db`
- `phpmyadmin`

Y cada contenedor tiene un `image`, que es una **imagen de contenedor**.
