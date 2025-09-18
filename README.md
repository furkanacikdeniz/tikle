# 📝 Tikle - Task Management System

A modern, user-friendly task management web application built with Laravel. Tikle helps individuals and teams organize, track, and manage their tasks efficiently with an intuitive interface and powerful features.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

## 🌟 Features

- ✅ **Task Management** - Create, edit, delete, and organize tasks
- 🔄 **Status Tracking** - Track task progress (Not Started, In Progress, Completed)
- 👥 **Team Collaboration** - Share tasks with team members
- 🔐 **User Authentication** - Secure login and registration system
- 📱 **Responsive Design** - Works seamlessly on all devices
- 🔍 **Search & Filter** - Find tasks quickly with advanced filtering
- 📊 **Dashboard** - Overview of all tasks and progress
- 🏷️ **Categories** - Organize tasks by categories

## 🛠️ Tech Stack

- **Backend**: Laravel 10.x (PHP Framework)
- **Database**: MySQL
- **Frontend**: Blade Templates, Bootstrap 5, JavaScript
- **Authentication**: Laravel Sanctum
- **Styling**: CSS3, SCSS
- **Icons**: Font Awesome

## 📋 Requirements

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- npm or Yarn
- MySQL >= 5.7 or MariaDB >= 10.3

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/furkanacikdeniz/tikle.git
cd tikle
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Configuration
Edit your `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tikle
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Database Setup
```bash
# Create database tables
php artisan migrate

# Seed sample data (optional)
php artisan db:seed
```

### 6. Build Assets
```bash
# Compile frontend assets
npm run dev

# For production
npm run build
```

### 7. Start the Application
```bash
# Start the development server
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## 📖 Usage

### Getting Started
1. **Register** a new account or **login** with existing credentials
2. **Create your first task** from the dashboard
3. **Set task details** including title, description, due date, and priority
4. **Track progress** by updating task status
5. **Collaborate** by sharing tasks with team members

### Task Management
- **Create Task**: Click "New Task" button and fill in the details
- **Edit Task**: Click on any task to modify its information
- **Delete Task**: Use the delete button to remove unwanted tasks
- **Status Update**: Use status dropdown to mark progress
- **Filter Tasks**: Use category and status filters to organize your view

## 📁 Project Structure

```
tikle/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php
│   │   ├── TaskController.php
│   │   └── DashboardController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Task.php
│   │   └── Category.php
│   └── Middleware/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── auth/
│   │   ├── tasks/
│   │   └── dashboard/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
└── public/
```

## 🎨 Screenshots

*Add screenshots of your application here*

## 🔧 Configuration

### Environment Variables
Key environment variables you may want to configure:

```env
APP_NAME=Tikle
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
```

### Queue Configuration
For background job processing:
```bash
# Start queue worker
php artisan queue:work
```

## 🧪 Testing

Run the test suite:
```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter TaskTest
```

## 🚀 Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false`
3. Configure your web server (Apache/Nginx)
4. Set up SSL certificate
5. Configure cron jobs for scheduled tasks

### Example Nginx Configuration
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/tikle/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/AmazingFeature`)
3. **Commit** your changes (`git commit -m 'Add some AmazingFeature'`)
4. **Push** to the branch (`git push origin feature/AmazingFeature`)
5. **Open** a Pull Request

### Development Guidelines
- Follow PSR-12 coding standards
- Write meaningful commit messages
- Add tests for new features
- Update documentation as needed

## 🐛 Bug Reports & Feature Requests

If you encounter any bugs or have feature requests:

1. **Search** existing issues first
2. **Create** a new issue with detailed information
3. **Include** steps to reproduce bugs
4. **Provide** system information (OS, PHP version, etc.)

## 📝 Changelog

### Version 1.0.0 (2024-03-XX)
- Initial release
- Task CRUD operations
- User authentication
- Dashboard with task overview
- Responsive design

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👤 Author

**Furkan Açıkdeniz**

- 📧 Email: furkanacikdeniz@gmail.com
- 💼 LinkedIn: [furkanacikdeniz](https://linkedin.com/in/furkanacikdeniz)
- 🐙 GitHub: [@furkanacikdeniz](https://github.com/furkanacikdeniz)
- 📍 Location: Ümraniye, İstanbul

## 🙏 Acknowledgments

- Laravel framework team for the amazing framework
- Bootstrap team for the responsive CSS framework
- Font Awesome for the beautiful icons
- All contributors who help improve this project

## 📞 Support

If you like this project, please consider:
- ⭐ Starring the repository
- 🐛 Reporting bugs
- 💡 Suggesting new features
- 🤝 Contributing to the code

---

<div align="center">
  <strong>Made with ❤️ by Furkan Açıkdeniz</strong>
</div>
