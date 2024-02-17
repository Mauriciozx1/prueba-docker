# API SPA Laravel 10
## Sobre Repositorio

Pequeño sistema el cual contiene lo siguiente:
- Atributos de usuarios: name, email, password
- Atributos de tareas: description
- Se utilizan las marcas de tiempo para: creación, actualizacion y eliminación de tareas.
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

- `git clone https://github.com/Mauriciozx1/prueba-docker.git`
- `cd prueba-docker`
- `composer install`
- `cp .env.example .env`
- Actualizar `.env` y establecer las credenciales de la base de datos
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan serve`

## Instalación con Docker
- `Modificar archivos de configuración`
- `docker compose up -d`
- `docker compose build app`
