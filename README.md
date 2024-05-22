
# Jhonatan Samuel Martinez Hernandez
Software Analyts and Developer
code 2675859
SENA 
Year 2024

# proyecto CRUD Laravel 11.7

* Rutas para gestionar productos

  * GET|HEAD  /products ................ muestra el index
  * GET|HEAD  /products/create ......... formulario para crear
  * POST      /products/store .......... metodo para guardar datos
  * GET|HEAD  /products/{id}/delete .... dispara metodo eliminar
  * GET|HEAD  /products/{id}/details ... muestra un proveedor en especifico
  * GET|HEAD  /products/{id}/edit ...... formulario para editar 
  * PUT|HEAD  /products/{id}/update .... metodo para actualizar datos

* Rutas para gestionar proveedores

  * GET|HEAD  /providers ................ muestra el index
  * GET|HEAD  /providers/create ......... formulario para crear
  * POST      /providers/store .......... metodo para guardar datos
  * GET|HEAD  /providers/{id}/delete .... dispara metodo eliminar
  * GET|HEAD  /providers/{id}/details ... muestra un proveedor en especifico
  * GET|HEAD  /providers/{id}/edit ...... formulario para editar 
  * PUT|HEAD  /providers/{id}/update .... metodo para actualizar datos

* Corrar las migraciones a la base de datos

ejecutar el comando php artisan migrate

* Como correr el proyecto

ejecutar el comando php artisan serve

* Nota: 

En la carpeta sql podrá encontrar el script para crear una copia de la base de datos que utilize para el proyecto. Éste script .sql contíene desde las migraciones de los modelos, hasta las configuraciones necesarias que realiza el framework laravel para la creacion de nuevas tablas en la base de datos. 

Para el proyecto hice uso de XAMPP con PHP 8.2.4-0 
