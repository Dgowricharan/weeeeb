FROM php:7.4-apache 
COPY ./ /var/www/html/
RUN echo "serverName localhost" >>/etc/apache2/apache2.conf
RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli
EXPOSE 80
