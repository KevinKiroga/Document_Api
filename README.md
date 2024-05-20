<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
</p>

## Requisitos para ejecutar el proyecto
- Visual Stude Code o un editor de codigo de su preferencia
- Tener la base de datos, debes usar MySQL / XAMPP ya que el proyecto esta configurado con ese tipo de BD entonces debes instalarle la version mas reciente que es el 8.2.12 de PHP para que no halla conflicto
- Instalar 7-Zip esto es para la gestion de archivo comprimidos
- Instalar composer es para el gestor de dependencias y poder ejecutar laravel
- Uso de git para poder clonar el proyecto

## Configuracion del proyecto
1. Debes clonar el respositorio debe utilizar git y ejecutar el siguiente comando en esta ubicacion C:/xampp/htdocs/ en tu CMD
```sh
    git clone https://github.com/KevinKiroga/Document_Api.git
```
2. Ubicar el proyecto utilizando tu CMD con el siguiente comando
```sh
    cd Document_Api
```
3. Abrir el proyecto, puedes abrir el proyecto de manera manual pero si tienes visual stude code puede ejecutar el siguiente comando:
```sh
    code .
```
4. Despues debes instalar las dependencias de laravel utilizando composer con el siguiente comando:
```sh
    composer i
```
5. En el inicio del proyecto debes cambiar el nombre del .env.example por .env
6. Luego debes ejecutar el siguiente comando
```sh
    php artisan key:generate
```
7. Ya cuando hagas el paso anterior ejecutaras las migraciones con el siguiente comando:
```sh
    php artisan migrate
```
te preguntara si deseas crear la base de datos tienes que teclear *yes*
8. Luego ejecutaras los Seeder para la sobrecarga de datos
```sh
    php artisan db:seed
```
9. Ahora debes ejecutar el servidor con el siguiente comando:
```sh
    php artisan serve
```
10. Finalmente, si desdea los test es con el siguiente comando:
```sh
    php artisan test
```
