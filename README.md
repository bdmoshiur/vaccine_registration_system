# COVID Vaccine Registration System

## Description
This is a COVID vaccine registration system built using Laravel. The system allows users to register for a vaccine, select a vaccine center, and receive their vaccination date based on a first-come, first-served basis. Users can also search for their vaccination status using their NID (National ID).


## Prerequisites
Ensure the following are installed on your machine:
- **Docker**: [Install Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Install Docker Compose](https://docs.docker.com/compose/install/)
- **Git**: [Install Git](https://git-scm.com/)

## Installation and Setup

### Step 1: Clone the Repository
Clone the repository to your local machine and navigate into the project directory:

```bash
git clone https://github.com/bdmoshiur/vaccine_registration_system.git
cd vaccine_registration_system
```

### Step 2: Configure Environment Variables
Copy the example environment file to create your own:

```bash
cp .env.example .env
```

Open the `.env` file in a text editor and configure the database and mail settings according to your environment.

### Step 3: Docker Setup
Build and run the application using Docker Compose:

```bash
docker compose build
docker compose up -d
```

### Step 4: Run Laravel Commands
Access the application container to run necessary Laravel commands for setup:

```bash
docker exec -it vaccine_registration_system_ms bash
```

Inside the container, execute the following commands to install dependencies, generate the application key, and migrate the database:

```bash
composer install
php artisan key:generate
php artisan migrate:fresh --seed
```

### Step 5: Access the Application
Once the application is up and running, visit the following URL in your browser:

```
http://localhost:7001
```

## Endpoints

1. **Registration Page**: 
   - **URL**: `/`
   - **Method**: GET
   - **Description**: Displays the registration form for users.

