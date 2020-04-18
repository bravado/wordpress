FROM bravado/php:7.3

ARG WP_VERSION=5.4

RUN curl -L https://br.wordpress.org/wordpress-${WP_VERSION}-pt_BR.tar.gz | tar -xz -C /var/www/html

ADD etc/ /etc/
ADD src/ /var/www/

ENV \
WP_DB_NAME=wordpress \
WP_DB_USER=wordpress \
WP_DB_PASSWORD=wordpress \
WP_DB_HOST=mysql \
WP_DB_CHARSET=utf8mb4 \
WP_DB_COLLATE=

VOLUME /var/www/html/wp-content
