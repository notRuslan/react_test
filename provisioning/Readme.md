Для приватного доступа к DockerHub достаточно выполнить тот же docker login, но не в свой реестр, а в registry-1.docker.io

ansible all -m ping -i hosts.yml
make site
make authorize
make docker-login

Deploy:

HOST=deploy@demo-auction.greenpanthera.com PORT=22 REGISTRY=registry-1.docker.io IMAGE_TAG=master-1 BUILD_NUMBER=1 make deploy