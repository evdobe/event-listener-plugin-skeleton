FROM php:8.1-cli

ENV BUILD_DEPS \
        git \
        zip 

RUN apt-get clean && apt-get update \
        && apt-get install -y ${BUILD_DEPS}

COPY target / 
ENV TZ=Europe/Athens
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -ri -e 's!;date.timezone =!date.timezone = "Europe/Athens"!g' /usr/local/etc/php/php.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY target / 
RUN chmod +x /opt/*.sh
WORKDIR /code
ENTRYPOINT /opt/entrypoint.sh