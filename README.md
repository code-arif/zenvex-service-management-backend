# Service Management Mini-App

A simple full-stack CRUD application built with **Laravel** (backend API).

---

## Folder Structure

```
service-management/
│
├── backend/                        ← Laravel project
│   ├── app/
│   │   ├── Http/
│   │   │   └── Controllers/
│   │   │       └── ServiceController.php   ← CRUD logic
│   │   └── Models/
│   │       └── Service.php                 ← Eloquent model
│   ├── config/
│   │   └── cors.php                        ← CORS settings
│   ├── database/
│   │   └── migrations/
│   │       └── xxxx_create_services_table.php
│   ├── routes/
│   │   └── api.php                         ← API route definitions
│   └── .env                                ← Database credentials
│___

```

---

## Step-by-Step Setup Instructions

### Prerequisites

Make sure you have installed:
- PHP 8.3+
- Composer
- MySQL
- Laravel 13

---

## BACKEND SETUP (Laravel)

### Step 1 — Create Laravel Project

```bash
composer create-project laravel/laravel backend
cd backend
```

### Step 2 — Configure .env (Database)

Open `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=service_management
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

Then create the database in MySQL:

```sql
CREATE DATABASE service_management;
```

### Step 3 — Create the Service Model + Migration

```bash
php artisan make:model Service -m
```

This creates:
- `app/Models/Service.php`
- `database/migrations/xxxx_create_services_table.php`

**Replace the migration file content** with the code from `create_services_table.php` provided.

**Replace the model file content** with the code from `Service.php` provided.

### Step 4 — Run the Migration

```bash
php artisan migrate
```

This creates the `services` table in your database.

### Step 5 — Create the Controller

```bash
php artisan make:controller Api/ServiceController
```

### Step 6 — Add API Routes

Open `routes/api.php` and **replace its content** with the code from `api.php` provided.

### Step 7 — Configure CORS

Open `config/cors.php` and **replace its content** with the code from `cors.php` provided.

This allows the React frontend (port 5173) to call the Laravel API (port 8000).

### Step 8 — Start Laravel Server

```bash
php artisan serve
```

Laravel will run at: `http://localhost:8000`

---