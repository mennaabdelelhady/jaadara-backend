# 🧾 Jadara Backend Technical Task

Backend API implementation for the **Jadara technical task**, built with **Laravel 12**.

## ✅ Features

- Laravel Sanctum authentication
- Email verification with 6-digit code
- Full CRUD for user posts
- `/stats` endpoint
- AJAX-based dashboard for managing posts

## 🧪 Postman Collection

Test all endpoints using the shared Postman collection:

🔗 [**Test with Postman**](https://athr99-2565.postman.co/workspace/My-Workspace~3ac6552e-3d56-4c5e-8a50-1c36194d1eca/collection/46310722-916a476b-143e-4a4b-8977-5197daa44626?action=share&creator=46310722&active-environment=46310722-a285e673-7f89-4f0b-9108-0920e9fc0f36)
``


-can find postman_collection.json inside Jaadara_backend.postman_collection,json

Use this to test:
- Registration & login flow
- Email verification
- Post CRUD
- Stats endpoint

## 🔐 Authentication

- `/register` – Name, email, password
- `/login`
- `/verify-code`
- Only verified users can log in

## 📄 Posts

- Users can only manage their own posts
- Endpoints: create, read, update, delete
- Fields: title, body, image

## 📊 Stats Endpoint

Returns:
- Total users
- Total posts
- Users with zero posts

## 🖥️ Web Interface

- Blade dashboard
- AJAX-based post creation and deletion
- Token stored in `localStorage`

## 🛠️ Requirements

- PHP 8.1+
- Laravel 12
- MySQL or SQLite
- Composer

## 🚀 Setup

```bash
git clone  https://github.com/yourname/jaadara-backend.git 
cd jaadara-backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
