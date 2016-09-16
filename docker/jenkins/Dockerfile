FROM jenkins

WORKDIR /var/www/betteram

USER root

RUN truncate -s 0 /etc/apt/sources.list
RUN echo \
    "deb http://packages.dotdeb.org jessie all" \
    "deb-src http://packages.dotdeb.org jessie all" \
    >> /etc/apt/sources.list

RUN wget https://www.dotdeb.org/dotdeb.gpg
RUN apt-key add dotdeb.gpg

#RUN apt-get update
#RUN apt-get install software-properties-common -y
#RUN apt-add-repository ppa:ondrej/php
RUN apt-get update --fix-missing
RUN apt-get install -y php7.0-fpm php7.0-dev php7.0-mysql php7.0-mbstring \
                       unzip zip curl

USER jenkins
