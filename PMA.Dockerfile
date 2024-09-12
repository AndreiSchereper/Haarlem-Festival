FROM phpmyadmin:latest


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

RUN pecl install sqlsrv && \
    docker-php-ext-enable sqlsrv

# COPY pma.conf.php /etc/phpmyadmin/config.inc.php

# RUN chmod 644 /etc/phpmyadmin/config.inc.php