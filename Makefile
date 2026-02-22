.PHONY: up down restart build logs shell migrate seed help

help: ## Show this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-15s\033[0m %s\n", $$1, $$2}'

up: ## Start all containers in background
	docker compose up -d
	@make permissions

down: ## Stop and remove all containers
	docker compose down

restart: ## Restart all containers
	docker compose restart
	@make permissions

build: ## Build or rebuild images
	docker compose up -d --build
	@make permissions

permissions: ## Fix storage and cache permissions
	docker exec -u root edificio-app chown -R www-data:www-data storage bootstrap/cache
	docker exec -u root edificio-app chmod -R 775 storage bootstrap/cache

migrate: ## Run database migrations
	docker exec edificio-app php artisan migrate --force

create-user: ## Create a new Filament user
	docker exec -it edificio-app php artisan make:filament-user

seed: ## Run database seeders
	docker exec edificio-app php artisan db:seed --force

optimize: ## Run Laravel optimization commands
	docker exec edificio-app php artisan config:cache
	docker exec edificio-app php artisan route:cache
	docker exec edificio-app php artisan view:cache
	docker exec edificio-app php artisan storage:link
	docker exec edificio-app php artisan filament:optimize

deploy: build ## Deploy updates (build, migrate, optimize, permissions)
	docker exec edificio-app composer install --no-interaction --optimize-autoloader --no-dev
	@make migrate
	@make optimize
	@make permissions

logs: ## View container logs
	docker compose logs -f

shell: ## Open a shell in the app container
	docker exec -it edificio-app sh
