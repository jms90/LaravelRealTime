<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Proyecto Laravel en tiempo real

Uso de aplicaciones en tiempo real como notificaciones cuando cambia el estado de un usuario.

## Para probar esta aplicación

1. Clona el repositorio.
2. Abre el directorio del proyecto y usa el comando **composer-install** para instalar todas las dependencias.
3. Crea o inicia sesion en **[pusher](https://pusher.com/)** y crea un cluster.
4. Modifica el archivo .env.
    1. para hacerlo más sencillo puedes usar sqlite cambiando la DB_CONNECTION a sqlite y comentando los demás campos y creando un archivo en el directorio /database llamado database.sqlite

        ```
        DB_CONNECTION=sqlite
        #DB_HOST=127.0.0.1
        #DB_PORT=3306
        #DB_DATABASE=laravel
        #DB_USERNAME=root
        #DB_PASSWORD=
        ```
    2. Cambiamos el broadcast_driver a pusher.

       ```
       BROADCAST_DRIVER=pusher
        ```
    3. Por ultimo buscamos las variables de entorno de pusher app e introducimos las del cluster de **[pusher](https://pusher.com/)** que creamos anteriormente.

        ```
        PUSHER_APP_ID=*******
        PUSHER_APP_KEY=********************
        PUSHER_APP_SECRET=********************
        PUSHER_APP_CLUSTER=eu
        ```
5. Creamos una clabe con el comando **php artisan key:generate** y comprobamos que nuestro archivo .env se ha actualizado

6. Y por último podremos ejecutar el proyecto utilizando el comando **php artisan serve**

7. Para probar la lista de usuarios puedes hacerlo con **[Postman](https://www.postman.com/)** a las siguientes rutas.

    ```
        * method-> get localhost:8000/api/users te devolverá todos los usuarios
        * method-> get localhost:8000/api/users/ID te devolverá el usuario con el mismo id
        * method-> post localhost:8000/api/users crear usuario (recuerda rellenar el body como form-data)
        * method-> update localhost:8000/api/users/id actualizar ese usuario (Recuerda rellenar body como x-www-form-urlencoded)
        * method-> delete localhost:8000/api/users/id borrar ese usuario
    ```
