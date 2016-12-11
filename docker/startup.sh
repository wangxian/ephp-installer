#!/bin/sh
# tail -F /app/logs/nginx-access.log /app/logs/nginx-error.log /app/logs/php-fpm-error.log /app/logs/php-fpm-slow.log &

echo "192.168.1.106 api.xxx.com" >> /etc/hosts

sh -c 'printf 5000 > /net/core/somaxconn'

chmod 777 -R app/logs/
chmod 777 -R app/cache/

exec php-fpm -F &
exec nginx
