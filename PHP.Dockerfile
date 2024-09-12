FROM php:fpm

# Install dependencies
RUN apt-get update && \
    apt-get install -y gnupg && \
    curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && \
    curl https://packages.microsoft.com/config/debian/10/prod.list > /etc/apt/sources.list.d/mssql-release.list && \
    apt-get update && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql17 unixodbc-dev

# Install pdo_sqlsrv extension
RUN pecl install pdo_sqlsrv && \
    docker-php-ext-enable pdo_sqlsrv

RUN docker-php-ext-install pdo pdo_mysql
