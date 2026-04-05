# Contact Directory

A contact management application built with Symfony 8.0, Doctrine ORM, and Hotwire (Stimulus + Turbo).

## Requirements

- Docker and Docker Compose

## Setup

### 1. Clone the repository

```bash
# HTTPS
git clone https://github.com/deepdreamer/user-directory.git

# SSH
git clone git@github.com:deepdreamer/user-directory.git

cd user-directory
```

### 2. Start the Docker containers

```bash
docker compose up -d
```

This starts three containers:

- **user_directory_php** — PHP 8.4-FPM
- **user_directory_nginx** — Nginx (exposed on port 8080)
- **user_directory_mariadb** — MariaDB LTS (exposed on port 3306)

### 3. Install dependencies

```bash
docker exec -it user_directory_php composer install
```

### 4. Run database migrations

```bash
docker exec -it user_directory_php bin/console doctrine:migrations:migrate --no-interaction
```

### 5. (Optional) Load sample data

Loads 50 sample contacts into the database:

```bash
docker exec -it user_directory_php composer fixtures
```

### 6. Open the application

Visit [http://localhost:8080](http://localhost:8080)

## Environment Configuration

The application is configured via environment variables in `app/.env`. The Docker setup provides sensible defaults, but you can override them by creating `app/.env.local` (not committed to git).

### Key variables

| Variable | Default | Description |
|---|---|---|
| `APP_ENV` | `dev` | Application environment (`dev`, `prod`, `test`) |
| `APP_SECRET` | *(empty)* | A secret used for CSRF tokens and other security features. Generate one with `bin/console secrets:generate-keys` or set any random string. |
| `DATABASE_URL` | `mysql://symfony:symfony@mariadb:3306/contact_directory?serverVersion=mariadb-11.4.0&charset=utf8mb4` | Doctrine database connection string |
| `MESSENGER_TRANSPORT_DSN` | `doctrine://default?auto_setup=0` | Symfony Messenger transport |


### Database credentials

The default credentials (matching `docker-compose.yml`):

| Parameter | Value |
|---|---|
| Host | `mariadb` (from inside Docker) or `localhost` (from host) |
| Port | `3306` |
| Database | `contact_directory` |
| User | `symfony` |
| Password | `symfony` |
| Root password | `root` |

## Code Quality Tools

All tools run inside the PHP container. Enter it first:

```bash
docker exec -it user_directory_php bash
```

Or prefix each command with `docker exec -it user_directory_php`.

### PHPStan (Static Analysis)

Analyses code for type errors, incorrect method calls, missing return types, and other issues. Configured at level 9 (strictest) with Symfony and Doctrine extensions.

```bash
composer phpstan
```

Configuration: `app/phpstan.dist.neon`

### PHPCS (Code Sniffer)

Checks code style against the PSR-12 standard:

```bash
composer phpcs
```

### PHPCBF (Code Beautifier and Fixer)

Automatically fixes code style violations detected by PHPCS:

```bash
composer phpcbf
```

Configuration: `app/phpcs.xml`

