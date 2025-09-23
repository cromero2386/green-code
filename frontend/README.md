# Frontend Documentation

This is the frontend part of the full-stack application built with React. It communicates with the Laravel backend to fetch and display logs.

## Project Structure

- **src/**: Contains the source code for the React application.
  - **components/**: Contains React components.
    - **LogTable.tsx**: Component that fetches and displays logs in a filterable table.
  - **App.tsx**: Main application component that renders the LogTable.
  - **index.tsx**: Entry point of the React application.

## Getting Started

1. **Installation**: 
   Run the following command to install the necessary dependencies:
   ```
   npm install
   ```

2. **Running the Application**: 
   Start the development server with:
   ```
   npm start
   ```

3. **Accessing the Application**: 
   Open your browser and navigate to `http://localhost:3000` to view the application.

## Features

- Fetches logs from the Laravel backend.
- Displays logs in a filterable table format.

## API Endpoints

The frontend interacts with the following API endpoint:
- `GET /api/logs`: Retrieves all logs along with their associated log levels.

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.