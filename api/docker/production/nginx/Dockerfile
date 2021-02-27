FROM nginx:1.17-alpine
#Строится от контекста в компосере
COPY ./docker/common/nginx/conf.d /etc/nginx/conf.d

WORKDIR /app
# Тут относитально рабочей директории app
COPY ./public ./public
