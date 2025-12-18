# Hospital Management System

![Front End](FrontEnd.png)

## Front End

![Front End](FrontEnd.png)

## Back End

![Back End](admin-screenshot.png)

## Database Tables

![Database Tables](Tables_Screenshot.png)

## Installation

Follow these instructions to set up and run the project locally on your Machine.

### Prerequisites

- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)
- [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/) (for Docker setup)

### Installation with Docker (Recommended)

1. Clone the repository:

```bash
   git clone https://github.com/tauseedzaman/hospitalMS.git
```
```bash
   cd hospitalMS
```

2. Build and start the Docker containers:

```bash
docker compose up -d --build
```

3. Install PHP dependencies (if not already installed):

```bash
docker compose exec app composer install
```

4. Create `.env` file from `.env.example`:

```bash
cp .env.example .env
```

5. Update `.env` file with Docker database settings:

```env
DB_HOST=db
DB_DATABASE=hospitalms
DB_USERNAME=hospitalms
DB_PASSWORD=password
```

6. Generate application key:

```bash
docker compose exec app php artisan key:generate
```

7. Create storage link:

```bash
docker compose exec app php artisan storage:link
```

8. Run migrations and seeders:

```bash
docker compose exec app php artisan migrate:fresh --seed
```

9. Access the application:

- Frontend: http://localhost
- MySQL: localhost:3306
- Redis: localhost:6379

### Installation (Traditional Method)

1. Clone the repository:

```bash
   git clone https://github.com/tauseedzaman/hospitalMS.git
```
 ```bash
   cd hospitalMS
```

 ```bash
composer install
```
 ```bash
cp .env.example .env
```
```bash
php artisan key:generate
 ```
```bash
php artisan storage:link
```
 ```bash
 php artisan migrate:fresh --seed
```
 ```bash
 php artisan serve
```

## Admin Credentials
Admin: 
```bash 
tauseed@test.com
```
Password: 
```bash
tauseed
```

## If you like our project please leave a star ❤

