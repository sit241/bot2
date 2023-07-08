FROM php:7.4-cli

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Копирование файлов приложения
COPY . /app

# Установка зависимостей
RUN composer install

CMD ["php", "-S", "0.0.0.0:8000"]
