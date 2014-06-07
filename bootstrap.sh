#!/usr/bin/env bash

apt-get update
apt-get install -y apache2
apt-get install -y php5
apt-get install -y git
apt-get install -y curl
rm -rf /var/www
ln -fs /vagrant /var/www
