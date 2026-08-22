ARG PHP_VERSION
ARG WP_VERSION

FROM wordpress:${WP_VERSION}-php${PHP_VERSION}-apache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install WP-CLI
RUN curl -fsSL https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
        -o /usr/local/bin/wp \
    && chmod +x /usr/local/bin/wp \
    && wp --info

ARG WSL_USER
ARG WSL_USER_ID

RUN useradd \
    --uid ${WSL_USER_ID} \
    --gid www-data \
    --groups www-data \
    --create-home \
    --shell /bin/bash \
    ${WSL_USER}

WORKDIR /var/www/html