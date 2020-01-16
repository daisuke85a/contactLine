FROM base

RUN pecl install xdebug \
  && docker-php-ext-enable xdebug

COPY ./dev.php.ini /usr/local/etc/php/php.ini