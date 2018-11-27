FROM ubuntu:16.04
RUN apt update && apt install -y git curl wget ca-certificates software-properties-common build-essential
ENV DEBIAN_FRONTEND noninteractive
RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN apt update && \
    apt install -y php5.6 php5.6-mbstring php5.6-mcrypt php5.6-mysql php5.6-xml php5.6-mysql php5.6-intl php5.6-fpm \
	nginx libgmp3-dev libmysqlclient-dev libcurl4-openssl-dev libidn11-dev librtmp-dev libldap2-dev libkrb5-dev comerr-dev \
	php5.6-memcached memcached php5.6-cli

RUN git clone https://github.com/tpruvot/yiimp /tmp/yiimp

RUN cd /tmp/yiimp/stratum/iniparser && make
RUN cd /tmp/yiimp/stratum && make
RUN cd /tmp/yiimp/blocknotify && make
 
# Nginx config
RUN find /etc/nginx/ && rm /etc/nginx/sites-enabled/default
ADD nginx.conf /etc/nginx/sites-available/yiimp
RUN ln -s /etc/nginx/sites-available/yiimp /etc/nginx/sites-enabled/yiimp
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf

# PHP config
RUN sed -i -e "s/;\?date.timezone\s*=\s*.*/date.timezone = UTC/g" /etc/php/5.6/fpm/php.ini


RUN mkdir /var/stratum
COPY /tmp/yiimp/stratum/stratum /var/stratum
COPY /tmp/yiimp/blocknotify/blocknotify /var/stratum
ADD stratum-in-path.sh /etc/profile.d
RUN cp -R /tmp/yiimp/web /var/web
ADD x11.conf /var/stratum
ADD c11.conf /var/stratum
ADD *.php /var/web/
RUN mkdir -p /work/yiimp && chmod a+rwX -R /work

# Define default command.
CMD service php5.6-fpm start && service memcached start && nginx
