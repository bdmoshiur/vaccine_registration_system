# COVID Vaccine Registration System

## Description
This is a COVID vaccine registration system built using Laravel. The system allows users to register for a vaccine, select a vaccine center, and receive their vaccination date based on a first-come, first-served basis. Users can also search for their vaccination status using their NID.

## Features
- **User Registration**: Users can register with their NID, select a vaccine center, and get scheduled.
- **Vaccine Centers**: Pre-populated vaccine centers with varying daily capacities.
- **First-Come-First-Serve Scheduling**: Users are scheduled for vaccination based on availability and order of registration.

## Prerequisites
Make sure the following are installed on your machine:
- **Docker**: [Install Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Install Docker Compose](https://docs.docker.com/compose/install/)
- **Git**: [Install Git](https://git-scm.com/)

## Installation and Setup

### Step 1: Clone the Repository

```bash
git clone <your-repository-url>
cd covid-vaccine-registration
```

### Step 2: Configure Environment Variables

- Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

### Step 3: Docker Setup

- Build and run the application with Docker Compose:

```bash
docker-compose build
docker-compose up -d
```

### Step 4: Run Laravel Commands

- Run the following commands inside the application container to install dependencies, migrate the database, and seed the vaccine centers:

```bash
docker exec -it vaccine_registration_system_db_ms bash

# Inside the container, run:
composer install
php artisan key:generate
php artisan migrate:fresh --seed
```

### Step 5: Access the Application

- Visit the application in your browser:

```
http://localhost:7001
```

## Endpoints

1. **Registration Page**: `/`
