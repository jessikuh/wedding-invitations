FROM nginx:1.17.6-alpine

COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /etc/nginx

CMD ["nginx", "-g", "daemon off;"]

EXPOSE 80