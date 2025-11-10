# Usa una imagen de PHP con Apache
FROM php:8.2-apache

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html/

# Instala extensiones necesarias (como mysqli)
RUN docker-php-ext-install mysqli

# Expone el puerto 80
EXPOSE 80
