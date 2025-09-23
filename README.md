# Full-Stack Application

This project is a full-stack application that consists of a Laravel backend and a React frontend. The backend manages logs and log levels, while the frontend displays these logs in a filterable table.

## Project Structure

```
fullstack-app
├── backend
│   ├── app
│   │   ├── Models
│   │   │   ├── Log.php
│   │   │   └── LogLevel.php
│   │   └── Http
│   │       └── Controllers
│   │           └── LogController.php
│   ├── database
│   │   ├── migrations
│   │   │   ├── 2024_01_01_000000_create_log_levels_table.php
│   │   │   └── 2024_01_01_000001_create_logs_table.php
│   │   └── seeders
│   │       └── LogSeeder.php
│   ├── routes
│   │   └── api.php
│   ├── composer.json
│   └── README.md
├── frontend
│   ├── src
│   │   ├── components
│   │   │   └── LogTable.tsx
│   │   ├── App.tsx
│   │   └── index.tsx
│   ├── package.json
│   └── README.md
├── docker-compose.yml
└── README.md
```

## Backend

The backend is built using Laravel and provides an API for managing logs. It includes:

- **Models**: `Log` and `LogLevel` with a one-to-many relationship.
- **Controllers**: `LogController` to handle API requests.
- **Migrations**: To create the necessary database tables.
- **Seeders**: To populate the database with 5000 log entries.

### API Endpoint

- **GET /api/logs**: Returns all logs with their associated log levels.

## Frontend

The frontend is built using React and displays logs in a filterable table. It includes:

- **Components**: `LogTable` to fetch and display logs.
- **Main Application**: `App` component that renders the `LogTable`.

## Getting Started

1. Clone the repository.
2. Navigate to the project directory.
3. Run `docker-compose up` to start the application.
4. Access the frontend at `http://localhost:3000` and the backend at `http://localhost:8000`.

## Technologies Used

- Laravel for the backend
- React for the frontend
- MySQL for the database
- Docker for containerization

## License

This project is licensed under the MIT License.