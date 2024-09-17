# Laravel Docker Deployment

This repository contains a Laravel application configured to run in a Docker container with SQLite as the database.

## Prerequisites

- **Docker**: Ensure Docker is installed on your system. You can download it from [Docker's official website](https://www.docker.com/get-started).
- **Docker Compose**: Docker Compose is required for managing multi-container Docker applications. Install it from [Docker Compose installation guide](https://docs.docker.com/compose/install/).

## Setup and Deployment

### 1. Clone the Repository

First, clone the repository to your local machine:

```bash
git clone https://github.com/kiranantony/request-logger.git
cd request-logger

2. Configure the Environment

Ensure you have a .env file in the root of your project directory. If it does not exist, create one by copying the example file:

cp .env.example .env

add the necessary values

DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/db/database.sqlite

3. Build and Start Docker Containers

Build the Docker image and start the containers:

docker-compose up --build -d

This command will:

    Build the Docker image based on the Dockerfile.
    Start the Docker containers defined in docker-compose.yml.

4. Run Migrations

Ensure that the database schema is up-to-date. This is handled automatically during container startup but can be manually run if needed:

docker-compose exec app php artisan migrate

5. Access the Application

Open your web browser and navigate to:

http://localhost:8000
