#! /bin/sh

# Load ENV variables into conf files
envsubst '${SEVER_NAME}' < /var/www/devops/nginx/http.d/server.conf > /etc/nginx/http.d/server.conf

# Laravel

php /var/www/artisan optimize:clear
php /var/www/artisan storage:link

[ "$APP_ENV" != "local" ] && php /var/www/artisan config:cache
[ "$APP_ENV" != "local" ] && php /var/www/artisan route:cache
[ "$APP_ENV" != "local" ] && php /var/www/artisan view:cache
[ "$APP_ENV" != "local" ] && php /var/www/artisan migrate --force

# Start cron
crond

# Run services
/usr/bin/supervisord --configuration "/etc/supervisor/supervisord.conf"