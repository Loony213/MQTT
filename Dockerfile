# Usar la imagen oficial de PHP como base
FROM php:8.1-cli

# Instalar las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libssl-dev \
    git \
    unzip \
    zip \
    && docker-php-ext-install sockets

# Establecer el directorio de trabajo en el contenedor
WORKDIR /usr/src/app

# Copiar el archivo composer.json y composer.lock al contenedor
COPY composer.json composer.lock ./

# Instalar las dependencias PHP utilizando Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction

# Copiar el resto de los archivos del proyecto al contenedor
COPY . .

# Comando para ejecutar el script PHP
CMD [ "php", "./mqtt_hello_world.php" ]
