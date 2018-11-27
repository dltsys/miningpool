#!/bin/bash

sudo mkdir -p logs/nginx
sudo mkdir -p logs/yiimp
sudo chmod a+rwX -R logs

docker rm -f pool-web
docker-compose build
docker-compose up -d
