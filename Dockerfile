# Dockerfile
FROM php:8.1-fpm

# PHPの拡張モジュールをインストール
RUN docker-php-ext-install pdo pdo_mysql

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
