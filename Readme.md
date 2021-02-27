Push to producation
``````
make try-build
REGISTRY=registty.mysite.com IMAGE_TAG=master-1 make build
docker push registty.mysite.com/auction-api:master-1



Run and delete
docker-compose run --rm api-php-cli php -v

docker-compose run --rm api-php-cli copmposer

docker-compose run --rm api-php-cli composer create-project slim/slim-skeleton slim
docker-compose run --rm api-php-cli composer require slim/slim slim/psr7


none interactive only!
docker-compose run --rm api-php-cli composer app hello

Push in my own REPO
docker push myrepo.mydomain.com/auction-gateway:${IMAGE_TAG}

docker login myrepo.mydomain.com 


docker pull myrepo.mydomain.com/auction-gateway:${IMAGE_TAG}

REGISTRY=fitter73 IMAGE_TAG=master-1 make build
docker push fitter73/auction-api-php-cli:master-1