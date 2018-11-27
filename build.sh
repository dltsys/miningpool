#!/bin/bash

sudo mkdir -p logs/nginx
sudo mkdir -p logs/yiimp
sudo chmod a+rwX -R logs
sudo mkdir -p data-node
sudo chmod a+rwX -R data-node
sudo mkdir -p data-backup
sudo chmod a+rwX -R data-backup
sudo mkdir -p logs/notify
sudo chmod a+rwX -R logs/notify

rm -f node/dashd
cp ~/dash-master/src/dashd node

docker rm -f pool-web
docker-compose build
docker-compose up -d
