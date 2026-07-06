# Event Management System (EMS) API

A RESTful Event Management System built with **Laravel 12** and **Laravel Sanctum** for user authentication.

## Features

- User Registration
- User Login (Laravel Sanctum Authentication)
- User Logout
- Create Event
- Update Event
- Delete Event
- View All Events
- Register for Event
- Prevent Duplicate Event Registration

## Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Laravel Sanctum
- Postman

---

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/Bm041992/Ems.git
cd Ems
```

### 2. Install dependencies

```bash
composer install
```

### 3. Create environment file

```bash
cp .env.example .env
```

> **Windows (Command Prompt):**

```cmd
copy .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure Database

Update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ems
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. (Optional) Run Seeders

This project includes an **AddAdminUserSeeder** to create a default admin user.

Run the following command:

```bash
php artisan db:seed --class=AddAdminUserSeeder
```

### 8. Start the Development Server

```bash
php artisan serve
```

The application will be available at:

```
http://127.0.0.1:8000
```

---

# Authentication

This project uses **Laravel Sanctum**.

After logging in, you'll receive an API token.

Use the token in the Authorization header:

```
Authorization: Bearer YOUR_ACCESS_TOKEN
```

---

# API Endpoints

## Authentication

| Method | Endpoint |
|--------|----------|
| POST | `/api/register` |
| POST | `/api/login` |
| POST | `/api/logout` |

## Events

| Method | Endpoint |
|--------|----------|
| GET | `/api/events` |
| POST | `/api/events` |
| PUT | `/api/events/{id}` |
| DELETE | `/api/events/{id}` |

## Event Registration

| Method | Endpoint |
|--------|----------|
| POST | `/api/events/register` |

---

# Postman Collection

The Postman collection is included in this repository:

```
postman/Ems.postman_collection.json
```

Import this file into Postman to test all APIs.

---

# Validation

- Duplicate event registration is prevented.
- Event capacity is checked before registration.
- Input validation is implemented for all APIs.
- Protected APIs require authentication.

---

# Project Structure

```
app/
bootstrap/
config/
database/
postman/
routes/
storage/
README.md
```

---

# Author

**Bhavesh Mistry**

GitHub: https://github.com/Bm041992