FROM node:slim

WORKDIR /var/www/betteram

COPY package.json .
COPY semantic.json .

RUN npm config set registry https://registry.npm.taobao.org #China Proxy... remove this guys...
RUN npm i -f

VOLUME ["node_modules", "public/js"]
ENTRYPOINT ["./node_modules/.bin/gulp"]

CMD watch
