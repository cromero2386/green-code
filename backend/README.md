# Full Stack Application - Backend

This is the backend part of the full-stack application built with Laravel. It provides an API to manage logs and log levels.

## Features

- **Log Management**: Create, read, update, and delete logs.
- **Log Levels**: Define different levels for logs (e.g., Info, Warning, Error).
- **API Endpoint**: Access logs with their associated levels via the `/api/logs` endpoint.

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   cd fullstack-app/backend
   ```

2. Install dependencies:
   ```
   composer install
   ```

3. Set up your environment variables in the `.env` file. You can copy the example:
   ```
   cp .env.example .env
   ```

4. Generate the application key:
   ```
   php artisan key:generate
   ```

5. Run migrations and seed the database:
   ```
   php artisan migrate --seed
   ```

## Usage

To start the Laravel development server, run:
```
php artisan serve
```

The API will be available at `http://localhost:8000/api/logs`.

## Directory Structure

- `app/Models`: Contains the Log and LogLevel models.
- `app/Http/Controllers`: Contains the LogController for handling API requests.
- `database/migrations`: Contains migration files for creating the necessary database tables.
- `database/seeders`: Contains the LogSeeder for populating the database with sample logs.
- `routes`: Contains the API routes for the application.

## Testing

You can run tests using:
```
php artisan test
```

## License

This project is licensed under the MIT License. See the LICENSE file for details.