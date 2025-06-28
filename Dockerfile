# Officiële PHP image met Apache
FROM php:8.2-apache

# Node.js versie te installeren
ARG NODE_VERSION=18

# Zet laravel public directory als root
# Alleen publiek mag toegankelijk zijn
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Zorg ervoor dat de Apache configuratie de juiste root gebruikt
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
 && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf

# Apache rewrite module inschakelen voor Laravel routing
RUN a2enmod rewrite

# Installeer pakketten en PHP extensies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    gnupg \
    ca-certificates \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    libxml2-dev \
    libpq-dev

# Installeer PHP extensies voor Laravel en algemene functionaliteiten
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli \
    pdo_pgsql \
    pgsql \
    mbstring \
    zip \
    gd \
    bcmath

# Installeer voor php pakketbeheer en autoloaden
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installeer Node.js en npm voor frontend assets
RUN curl -fsSL https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash - \
 && apt-get install -y nodejs \
 && npm -v && node -v

# Kopieer de applicatie bestanden naar de container
COPY . /var/www/html/

# Zet de werkdirectory voor npm en composer
WORKDIR /var/www/html

# Compileer de frontend assets met npm
RUN composer install --optimize-autoloader --no-dev \
 && npm install \
 && npm run build

# Zet de juiste rechten voor laravel opslag en cache
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache
