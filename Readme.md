Push to producation
``````
make try-build
REGISTRY=registty.mysite.com IMAGE_TAG=master-1 make build
docker push registty.mysite.com/auction-api:master-1

REGISTRY=registry-1.docker.io IMAGE_TAG=master-1 BUILD_NUMBER=1 make build


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



docker push fitter73/auction-api-php-cli:master-1

HOST=deploy@demo-auction.greenpanthera.com PORT=22 REGISTRY=registry-1.docker.io IMAGE_TAG=master-1 BUILD_NUMBER=1 make deploy

Console commnds:

docker-compose run api-php-cli php bin/app.php
docker-compose run api-php-cli php bin/app.php hello

composer.json:
"scripts": {
        "app" : "php bin/app.php --ansi"
    }
--ansi  // - Colored output
#####
docker-compose run api-php-cli composer app // Run like --no-interection
REGISTRY=registry-1.docker.io IMAGE_TAG=master-1 BUILD_NUMBER=1 make build
docker push fitter73/auction-api-php-cli:master-1
HOST=deploy@demo-auction.greenpanthera.com PORT=22 REGISTRY=registry-1.docker.io IMAGE_TAG=master-1 BUILD_NUMBER=1 make deploy


--- Create psalm.xls ----
./vendor/bin/psalm --init src 1   // 1 strong level ( from 1 (strong) to 8 (light) )


docker-compose run api-php-cli ./vendor/bin/phpunit --generate-configuration
-- Run tests --
docker-compose run --rm api-php-cli composer test
docker-compose run --rm api-php-cli composer test -- --filter=Functional
docker-compose run --rm api-php-cli composer test -- --filter=Unit

docker-compose run --rm api-php-cli composer test -- --testsuite=functional
docker-compose run --rm api-php-cli composer test -- --testsuite=unit

docker-compose run --rm api-php-cli composer app orm:validate-schema
 docker-compose run --rm api-php-cli composer app orm:schema-tool:drop -
- --force

docker-compose run --rm api-php-cli composer app migrations:diff
docker-compose run --rm api-php-cli composer app migrations:migrate
