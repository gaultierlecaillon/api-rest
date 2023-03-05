FROM nginx:1.23

ADD ./.docker/local/web/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
