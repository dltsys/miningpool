FROM ubuntu:16.04
RUN apt update && apt install -y git curl wget ca-certificates software-properties-common build-essential
ENV DEBIAN_FRONTEND noninteractive
RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN apt update && \
    apt install -y php5.6 php5.6-mbstring php5.6-mcrypt php5.6-mysql php5.6-xml php5.6-mysql php5.6-intl php5.6-fpm \
	nginx libgmp3-dev libmysqlclient-dev libcurl4-openssl-dev libidn11-dev librtmp-dev libldap2-dev libkrb5-dev comerr-dev \
	php5.6-memcached memcached php5.6-cli libssl-dev php5.6-memcache php5.6-curl nullmailer patch mysql-client-5.7

RUN git clone https://github.com/tpruvot/yiimp /tmp/yiimp

ADD stratum-util-logging.patch /tmp/yiimp/stratum/
RUN patch /tmp/yiimp/stratum/util.cpp /tmp/yiimp/stratum/stratum-util-logging.patch
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

RUN mkdir -p /var/stratum/config && \
    cp /tmp/yiimp/stratum/stratum /var/stratum && \
    cp /tmp/yiimp/blocknotify/blocknotify /var/stratum
ADD stratum-in-path.sh /etc/profile.d
RUN cp -R /tmp/yiimp/web /var/web
ADD x11.conf /var/stratum/
ADD c11.conf /var/stratum/
ADD *.php /var/web/
RUN mkdir -p /work/yiimp && chmod a+rwX -R /work
RUN chmod a+rwx -R /var/web/yaamp/runtime && chmod a+rwx -R /var/web/assets
RUN mkdir -p /etc/yiimp && mkdir -p /var/log/fpm
ADD keys.php /etc/yiimp
RUN sed -i -re "s/.*chdir .*/chdir = \/var\/web/g" /etc/php/5.6/fpm/pool.d/www.conf
RUN sed -i -re "s/.*catch_workers_output .*/catch_workers_output = yes/g" /etc/php/5.6/fpm/pool.d/www.conf
RUN sed -i -re "s/.*pm\.max_children .*/pm.max_children = 100/g" /etc/php/5.6/fpm/pool.d/www.conf
RUN sed -i -re "s/.*error_log .*/error_log = \/var\/log\/fpm\/php5.6-fpm.log/g" /etc/php/5.6/fpm/php-fpm.conf
RUN sed -i -re "s/.*rlimit_files .*/rlimit_files = 10240/g" /etc/php/5.6/fpm/php-fpm.conf
RUN sed -i -re "s/.*rlimit_files .*/rlimit_files = 10240/g" /etc/php/5.6/fpm/pool.d/www.conf
RUN sed -i -re "s/.*pm\.max_spare_servers .*/pm.max_spare_servers = 10/g" /etc/php/5.6/fpm/pool.d/www.conf
RUN sed -i -re "s/.*pm\.start_servers .*/pm.start_servers = 5/g" /etc/php/5.6/fpm/pool.d/www.conf
RUN sed -i -re "s/.*max_execution_time .*/max_execution_time = 300/g" /etc/php/5.6/fpm/php.ini
ADD nullmailer/ /etc/nullmailer/
ADD run-stratum /var/stratum/
RUN mkdir -p /var/stratum/log && chmod a+rwX -R /var/stratum

# Define default command.
CMD service php5.6-fpm start && service memcached start && nginx
