build-fe:
	docker-compose run frontend make build

run:
	docker-compose up

attach:
	docker exec -i -t laraveltestapp_web-server_1 /bin/bash
