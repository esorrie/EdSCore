########################################################
#   Build frontend                                     #
########################################################

FROM node:16 AS node_stage

# Set working directory
WORKDIR /src

# Copy files
COPY . .

# Run npm
RUN npm install && npm run build

# Delete node_modules
RUN rm -rf node_modules

########################################################
#   Build the main application                         #
########################################################

FROM php:8.2.0-fpm-alpine3.17

# Run as root
USER root

# Set workdir
WORKDIR /var/www

# Install packages (nginx, supervisor, gettext)
RUN apk update && apk add --no-cache \
    nginx \
    nginx-mod-http-headers-more \
    supervisor \
    gettext

RUN apk add --no-cache pcre-dev $PHPIZE_DEPS

# Remove APK cache
RUN rm /var/cache/apk/*

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions pdo_mysql zip intl

# Copy files and permissions
RUN rm -R html
RUN rm -R localhost
COPY --chown=www-data:www-data --from=node_stage /src /var/www
RUN touch storage/logs/laravel.log
RUN chown www-data:www-data storage/logs/laravel.log

# Run composer
RUN php composer.phar install --optimize-autoloader --no-dev

# nginx conf
RUN cp devops/nginx/nginx.conf /etc/nginx/nginx.conf
RUN rm /etc/nginx/http.d/default.conf

# php-fpm conf
RUN cp devops/php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

# Supervisor config
RUN mkdir /etc/supervisor
RUN cp devops/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
RUN mkdir /etc/supervisor/conf.d
RUN cp devops/supervisor/conf.d/* /etc/supervisor/conf.d/

# crontab
RUN cp devops/crontab/crontab /etc/crontabs/root

# Entrypoint
COPY devops/docker/docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]
