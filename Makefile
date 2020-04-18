DOCKER_IMAGE ?= bravado/wordpress
GIT_BRANCH ?= $(shell git rev-parse --abbrev-ref HEAD)
DOCKER_TAG ?= $(DOCKER_IMAGE):$(GIT_BRANCH)

.PHONY: build push test build-dev
default: build

build:
	docker build --cache-from ${DOCKER_TAG} -t ${DOCKER_TAG} .

build-dev:
	docker build --cache-from ${DOCKER_TAG}-dev -t ${DOCKER_TAG}-dev -f Dockerfile.dev .

test: build
	bash test.sh ${DOCKER_IMAGE} ${GIT_BRANCH}

run: PUID=1000
run: PGID=1000
run: USER=app
run: PORT=80
run:
	docker run -it --user=${USER} --rm -p ${PORT}:80 --link mysql:mysql -v ${PWD}/wp-content:/var/www/html/wp-content -e PUID=${PUID} -e PGID=${PGID} ${DOCKER_TAG} ${CMD}

pull:
	docker pull registry.gitlab.com/prosoma/php:7.3
	docker pull ${DOCKER_TAG}
	docker pull ${DOCKER_TAG}-dev
