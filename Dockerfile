FROM wangxian/alpine-php:7.0.14.r0
MAINTAINER WangXian <xian366@126.com>

# Copy app source to image
ADD . .
RUN rm -rf /app/.git && mv /app/docker/startup.sh /app

EXPOSE 80 443

ENV RUN_ENV=prod MAX_REQUEST=2000 STDOUT_LOG=true

# Custom server configure
ADD docker/nginx.conf /etc/nginx/
ADD docker/php-fpm.conf /etc/php7/

CMD ["/bin/sh", "/app/startup.sh"]
