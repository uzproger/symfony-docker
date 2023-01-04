include .env
export

ENV ?= ${APP_ENV}
DOCKER_COMPOSE_FILE ?= docker-compose.yaml
DOCKER_WORK_DIR ?= /var/www/html

arg = $(filter-out $@,$(MAKECMDGOALS))

.PHONY: list help
help::
	@echo "\n"
	@echo "\033[1;33mMakefile\033[0m"
	@echo "\033[0;33m\thelp\033[0m - Print help"
	@echo "\033[0;33m\tlist\033[0m - Print list of all possible commands"

list:
	@$(MAKE) -qp | awk -F':' '/^[a-zA-Z0-9][^$$#\/\t=]*:([^=]|$$)/ {split($$1,A,/ /);for(i in A)print A[i]}' | grep -v Makefile | sort -u

include Makefile.*
-include pf-makefiles/Makefile.*

%:
	@:
