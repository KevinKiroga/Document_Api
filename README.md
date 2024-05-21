<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
</p>

## Requisitos para ejecutar el proyecto
- Visual Stude Code o un editor de codigo de su preferencia
- Instalar MySQL / XAMPP ya que el proyecto esta configurado con ese tipo de BD entonces debes instalarle la version mas reciente que es el 8.2.12 de PHP para que no halla conflicto.
- Instalar 7-Zip esto es para la gestion de archivo comprimidos
- Instalar composer es para el gestor de dependencias y poder ejecutar laravel
- Uso de git para poder clonar el proyecto

## Configuracion del proyecto Document_Api
## 1. Clonar el Repositorio
Debes usar git para clonar el repositorio. Abre tu CMD y valla al siguiente directorio `C:/xampp/htdocs/`. Luego, ejecuta el siguiente comando:
```sh
    git clone https://github.com/KevinKiroga/Document_Api.git
```
## 2. Acceder al proyecto
Después de clonar, cambia la direccion y entrar carpeta del proyecto usando:
```sh
    cd Document_Api
```
## 3. Abrir el proyecto
Puedes abrir el proyecto manualmente en tu editor de código preferido. Si tienes Visual Studio Code instalado, puedes abrir el proyecto usando:
```sh
    code .
```
## 4. Instalar Dependencias de Laravel
Instala las dependencias necesarias de Laravel utilizando Composer:
```sh
    composer i
```
## 5. Configurar el Archivo de .env
Renombra el archivo .env.example a .env:
## 6. Generar la APP KEY
Genera una nueva clave para la aplicación:
```sh
    php artisan key:generate
```
## 7. Ejecutar las Migraciones de la Base de Datos
Ejecuta las migraciones de la base de datos:
```sh
    php artisan migrate
```
Si se te pregunta si deseas crear la base de datos, escribe yes.
## 8. Ejecutar los Seeder
Ejecuta los seeders para cargar datos iniciales en la base de datos:
```sh
    php artisan db:seed
```
## 9. Iniciar el Servidor
Inicia el servidor de Laravel:
```sh
    php artisan serve
```
## 10. Ejecutar Pruebas (Opcional)
Si deseas ejecutar pruebas, usa el siguiente comando:
```sh
    php artisan test
```
## Auntenticacion del usuario
```json
{
  "email": "usuario@gmail.com",
  "password": "usuario"
}
```

## Estas serian las APIS
| Método | Ruta                 | Descripción                            |
|--------|----------------------|----------------------------------------|
| POST   |http://127.0.0.1:8000/api/login       | Realiza el logueo de un usuario          |
| GET    | http://127.0.0.1:8000/api/documento       | Obtiene todos los documentos          |
| GET    | http://127.0.0.1:8000/api/documento/{id}  | Obtiene un documento por su ID        |
| POST   | http://127.0.0.1:8000/api/documento      | Crea un nuevo documento               |
| PUT    | http://127.0.0.1:8000/api/documento/{id}  | Actualiza un documento existente por su ID |
| DELETE | http://127.0.0.1:8000/api/documento/{id}  | Elimina un documento por su ID        |
| GET   |http://127.0.0.1:8000/api/logout       | Cerrar sesion del usuario          |
