init: docker-down docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans
docker:
	docker-compose down  --remove-orphans && docker-compose rm -f; docker-compose up -d --build;
	#docker-compose down -v --remove-orphans && docker-compose rm -f;docker-compose up -d --build;

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

docker-clear:
	docker-compose down -v --remove-orphans

build: build-gateway build-frontend build-api

build-gateway:
	docker --log-level=debug build --pull --file=gateway/docker/production/nginx/Dockerfile --tag=${REGISTRY}/auction-gateway:${IMAGE_TAG} gateway/docker

build-frontend:
	docker --log-level=debug build --pull --file=frontend/docker/production/nginx/Dockerfile --tag=${REGISTRY}/auction-frontend:${IMAGE_TAG} frontend

build-api:
	docker --log-level=debug build --pull --file=api/docker/production/php-fpm/Dockerfile --tag=${REGISTRY}/auction-api-php-fpm:${IMAGE_TAG} api
	docker --log-level=debug build --pull --file=api/docker/production/php-cli/Dockerfile --tag=${REGISTRY}/auction-api-php-cli:${IMAGE_TAG} api
	docker --log-level=debug build --pull --file=api/docker/production/nginx/Dockerfile --tag=${REGISTRY}/auction-api:${IMAGE_TAG} api

try-build:
	REGISTRY=localhost IMAGE_TAG=0 make build
