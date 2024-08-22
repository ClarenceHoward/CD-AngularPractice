#!/bin/bash

cd /var/www/html/CD-AngularPractice
git pull origin main
npm install
ng build 
sudo systemctl restart httpd
