docker-up:
	docker-compose up -d

docker-down:
	docker-compose down
docker:
	docker-compose stop && docker-compose rm -f;docker-compose up -d --build;

