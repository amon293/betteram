FROM jenkins

WORKDIR /var/www/betteram

USER root

RUN echo \
    "deb http://packages.dotdeb.org jessie all" \
    >> /etc/apt/sources.list

RUN apt-get update
RUN apt-get install software-properties-common -y
RUN apt-add-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php7.0-fpm php7.0-dev php7.0-mysql php7.0-mbstring \
                       unzip zip curl

USER jenkins
