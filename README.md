# 📷 Laravel Social Network

**A feature-rich social networking platform built with Laravel, MySQL, and Bootstrap**  
Connect, share images, like posts, and interact with a growing community!

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.x-%23777BB4?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.x-%234479A1?logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-%237952B3?logo=bootstrap)

---

## 🌟 Project Overview
This social network allows users to:
- 🔐 **Register/Login** securely using Laravel's authentication system.
- 📸 **Upload, edit, and delete** images with descriptions.
- 👍 **Like and comment** on posts to interact with the community.
- 🗂️ **Browse user profiles** and view their shared content.
- 🔍 **Search users dynamically** and explore trending posts.

Built with security, performance, and scalability in mind, leveraging Laravel's robust framework capabilities.

---

## 🛠️ Technical Stack

| **Category**       | **Technologies**                                                 |
|-------------------|-----------------------------------------------------------------|
| **Backend**       | Laravel 11.x, PHP 8.x, MySQL 8.x                                 |
| **Frontend**      | Blade Templates, Bootstrap 5, JavaScript (jQuery, AJAX)        |
| **Security**      | Laravel Middleware, CSRF Protection, Encrypted Passwords       |
| **Database**      | Eloquent ORM for efficient queries                             |
| **Storage**       | Laravel Filesystem for image uploads                           |

---

## 🚀 Key Features

### 👥 User Management
- **Registration & Login**: Secure authentication with password encryption.
- **Profile Customization**: Update name, email, avatar, and other settings.
- **User Search**: Find people using a dynamic search bar.

### 📸 Image Sharing System
- **Upload Images**: Post photos with descriptions.
- **Edit/Delete**: Manage personal uploads.
- **Public Feed**: Displays posts in chronological order.

### 👍 Likes & Comments
- **Like Images**: Express appreciation for other users’ content.
- **Comment System**: Engage in discussions directly on posts.

### 🛡️ Security & Validation
- **CSRF & Middleware Protection**: Ensures secure user interactions.
- **Session Management**: Protects user sessions from unauthorized access.
- **Password Hashing**: Uses Laravel's secure hashing algorithms.

---

## 📂 Project Structure
```plaintext
laravel-social/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/
│   │   ├── CommentController.php
│   │   ├── HomeController.php
│   │   ├── ImageController.php
│   │   ├── LikeController.php
│   │   ├── UserController.php
│   ├── Models/
│   │   ├── Comment.php
│   │   ├── Image.php
│   │   ├── Like.php
│   │   ├── User.php
│── database/
│── resources/views/
│── public/
│── routes/web.php
│── storage/
│── .env.example
│── artisan
│── composer.json
│── package.json
│── README.md
```

---

## ⚙️ Installation Guide

### Prerequisites
Ensure you have the following installed:
- PHP 8.x
- Composer
- MySQL
- Node.js & npm

### Steps
1. **Clone the repository**:
   ```sh
   git clone https://github.com/yourusername/laravel-social.git
   cd laravel-social
   ```
2. **Install dependencies**:
   ```sh
   composer install
   npm install && npm run dev
   ```
3. **Set up environment variables**:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
   Configure database settings in `.env`:
   ```env
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```
4. **Run migrations & seed data**:
   ```sh
   php artisan migrate --seed
   ```
5. **Start the server**:
   ```sh
   php artisan serve
   ```
   
## 👨‍💻 Author
**Name:** Miguel Octavio Aguila  
**GitHub:** [@miguel-octavio-aguila](https://github.com/miguel-octavio-aguila)  
**LinkedIn:** [Miguel Octavio Águila Rodríguez](www.linkedin.com/in/miguel-octavio-águila-rodríguez-6241b71a9)



