# Imagen base de PHP con FPM
FROM php:8.1-fpm

# Instalar dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    && docker-php-ext-install pdo mbstring exif bcmath gd zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Crear directorios necesarios y ajustar permisos
RUN mkdir -p /var/www/html/storage/framework/{views,sessions,cache} \
    && mkdir -p /var/www/html/storage/logs \
    && chmod -R o+w /var/www/html/storage \
    && chmod -R o+w /var/www/html/bootstrap/cache

RUN composer install

RUN php artisan key:generate

RUN php artisan config:cache
RUN php artisan route:cache

RUN php artisan storage:link

# Exponer el puerto usado por PHP-FPM
EXPOSE 9000

# Comando por defecto para iniciar PHP-FPM
CMD ["php-fpm"]
