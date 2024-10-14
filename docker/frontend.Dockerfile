FROM node:22.9.0-alpine

WORKDIR /var/www/html
COPY . /var/www/html

RUN npm install
