FROM wangxian/alpine-php:latest
MAINTAINER WangXian <xian366@126.com>

# Copy app source to image
ADD . .
RUN rm -rf /app/.git && mv /app/docker/startup.sh /app

EXPOSE 80 443

# Custom server configure
ADD docker/nginx.conf /etc/nginx/
ADD docker/php-fpm.conf /etc/php5/

CMD ["/bin/sh", "/app/startup.sh"]
