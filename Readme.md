Push to producation
``````
make try-build
REGISTRY=registty.mysite.com IMAGE_TAG=master-1 make build
docker push registty.mysite.com/auction-api:master-1



Run and delete
docker-compose run --rm api-php-cli php -v

docker-compose run --rm api-php-cli copmposer