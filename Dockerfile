# Imagen base
FROM php:8.1-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    nginx \
    zip \
    unzip

# Copiar archivos de configuración de Nginx
COPY docker/nginx/laravel.conf /etc/nginx/conf.d/default.conf

# Configurar el directorio de trabajo y copiar los archivos del proyecto
WORKDIR /var/www/html
COPY . ~/www/prueba-api

# Instalar dependencias de PHP
RUN docker-php-ext-install pdo pdo_mysql

# Exponer el puerto 80 para Nginx
EXPOSE 80

# Comando para iniciar Nginx y PHP-FPM
CMD service nginx start && php-fpm

