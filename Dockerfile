FROM webdevops/php-nginx:8.2-alpine

# Install Laravel framework system requirements (https://laravel.com/docs/8.x/deployment#optimizing-configuration-loading)
RUN apk add oniguruma-dev libxml2-dev
RUN docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        mbstring \
        pdo_mysql \
        xml

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production
WORKDIR /app

COPY .docker/nginx/app.conf /opt/docker/etc/nginx/conf.d/app.conf

COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-ansi --no-plugins --no-progress --no-scripts --no-suggest

RUN chown -R application:application .
