FROM jenkins:latest

WORKDIR /var/www/betteram

USER root

RUN echo \
    "deb http://packages.dotdeb.org jessie all" \
    >> /etc/apt/sources.list

RUN wget https://www.dotdeb.org/dotdeb.gpg
RUN apt-key add dotdeb.gpg

#RUN apt-get update
#RUN apt-get install software-properties-common -y
#RUN apt-add-repository ppa:ondrej/php
RUN apt-get update --fix-missing
RUN apt-get upgrade -y
RUN apt-get install -y php7.0 php7.0-mysql php7.0-mbstring php7.0-redis \
                       php7.0-xml php7.0-mcrypt php7.0-memcached \
                       npm nodejs curl

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN npm install n gulp typings -g
RUN n latest

#USER jenkins /recomended ... but lets do it in production only
