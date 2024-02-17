# API SPA Laravel 10
## Sobre Repositorio

Pequeño sistema el cual contiene lo siguiente:
- Atributos de usuarios: name, email, password
- Atributos de tareas: descrition
- Se utilizan las marcas de tiempo para: creación, actualizacion y eliminación de usuarios.
- Se incorporan validaciones en formularios de las solicitudes del backend.
- La lista de usuarios y tareas esta compaginada.
- La autenticacion se realiza por Token.

## Requerimientos

- Laravel 10
- PHP 8.2
- Composer
- Docker
- Nginx

## Contenido 

- Sistema de autentificación
- Gestión de tareas

## Instalación sin Docker

- `git clone https://github.com/Mauriciozx1/prueba-api.git`
- `cd prueba-api`
- `composer install`
- `cp .env.example .env`
- Actualizar `.env` y establecer las credenciales de la base de datos
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed --class=UserSeeder`
- `npm install`
- `npm run dev`
- `php artisan serve`
- Ingresa `http://localhost:8000` con: `email:demoprueba@test.cl y contraseña:password`

## Instalación con Docker
- `Modificar archivos de configuración`
- `docker compose up -d`
- `docker compose build app`
