FROM node:8.10.0-alpine

WORKDIR /var/www/
COPY ./easyduathlon.com /var/www/

RUN npm install --quiet

EXPOSE 3000

CMD tail -f /etc/hosts
