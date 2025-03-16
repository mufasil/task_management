# Laravel Task Management API

## Setup Instructions

### Prerequisites
Ensure you have the following installed on your system:
- PHP (>=8.0)
- Composer
- Laravel
- MySQL or PostgreSQL
- Node.js & npm (for frontend assets if applicable)

### Installation Steps

1. **Clone the repository**
   ```sh
   git clone https://github.com/mufasil/task_management.git
   cd task_management
   ```

2. **Install dependencies**
   ```sh
   composer install
   ```

3. **Set up environment variables**
   ```sh
   cp .env.example .env
   ```
   Update database credentials and other configurations in the `.env` file.

4. **Generate application key**
   ```sh
   php artisan key:generate
   ```

5. **Configure Database Queue**

   Update the .env file to use the database queue driver:

   ```sh
   QUEUE_CONNECTION=database
   ```

   Then, create the queue table and migrate the database:

   ```
   php artisan queue:table
   php artisan migrate
   ```

6. **Serve the application**
   ```sh
   php artisan serve
   ```
   The application will be accessible at `http://127.0.0.1:8000`.

---

## API Documentation

### Import Postman Collection
Import the Postman collection file found in the project root:
`Task Management.postman_collection.json`

### Authentication APIs

#### Login
- **Endpoint:** `POST /api/login`
- **Description:** Authenticates a user and returns an access token.

#### Register
- **Endpoint:** `POST /api/register`
- **Description:** Registers a new user and returns an access token.

### Task APIs

#### Create Task
- **Endpoint:** `POST /api/tasks`
- **Description:** Creates a new task with title and description.

#### Update Task
- **Endpoint:** `PUT /api/tasks/{id}`
- **Description:** Updates an existing task by ID.

#### List Tasks
- **Endpoint:** `GET /api/tasks`
- **Description:** Retrieves a list of all tasks.

#### Delete Task
- **Endpoint:** `DELETE /api/tasks/{id}`
- **Description:** Deletes a specific task by ID.

### Comments APIs

#### Add Comment to Task
- **Endpoint:** `POST /api/tasks/{id}/comments`
- **Description:** Adds a comment to a specific task.

#### Update Comment
- **Endpoint:** `PUT /api/comments/{id}`
- **Description:** Updates a specific comment by ID.

#### Delete Comment
- **Endpoint:** `DELETE /api/comments/{id}`
- **Description:** Deletes a specific comment by ID.

#### List Comments by Task
- **Endpoint:** `GET /api/tasks/{id}/comments`
- **Description:** Retrieves all comments related to a specific task.

---

## Additional Commands

### Clearing Cache
```sh
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Running Queue Worker (if applicable)
```sh
php artisan queue:work
```

---

## License
This project is licensed under the MIT License.