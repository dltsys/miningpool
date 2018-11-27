FROM ubuntu:16.04
ENV DEBIAN_FRONTEND=noninteractive 
RUN apt update && apt install -y \
    libzmq5 \
    libboost-system1.58.0 \
    libboost-filesystem1.58.0 \
    libboost-program-options1.58.0 \
    libboost-thread1.58.0 \
    libboost-chrono1.58.0 \
    libminiupnpc10 \
    libevent-pthreads-2.0-5 \
    libevent-2.0-5 \
    libstdc++6 \
    libsodium18 \
    libevent-core-2.0-5 \
    python-software-properties \
    software-properties-common \
    nullmailer

RUN add-apt-repository ppa:bitcoin/bitcoin && \
    apt-get update && \
    apt-get install -y libdb4.8-dev libdb4.8++-dev

RUN apt install -y build-essential git && \
    git clone https://github.com/tpruvot/yiimp /tmp/yiimp && \
    cd /tmp/yiimp/blocknotify && \
    make

RUN groupadd -g 1000 fullnode
RUN useradd -m -d /home/dash -s /bin/bash -g 1000 -u 1000 fullnode
RUN mkdir -p /home/fullnode && chown 1000.1000 /home/fullnode -R
USER fullnode
ENV HOME /home/fullnode

ADD dashd /home/fullnode
ADD nullmailer/ /etc/nullmailer/
ADD notify-* /home/fullnode/
RUN cp /tmp/yiimp/blocknotify/blocknotify /home/fullnode/

CMD [ "/home/fullnode/dashd" ]
