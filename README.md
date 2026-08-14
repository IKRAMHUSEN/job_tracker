# Job Tracker

A Laravel application for tracking job applications from the initial application through interviews, offers, and rejections.

## Features

- Create, view, edit, and delete job applications.
- Track company, role, application date, location, salary expectations, notice period, and notes.
- Track application status: `Applied`, `Interview`, `Offer`, or `Rejected`.
- Filter applications by status.
- View application statistics on the dashboard.
- Display interview reminders for interviews scheduled today or within the next two days.

## Tech Stack

- PHP 8.3+
- Laravel 13
- Blade
- Tailwind CSS 4
- Vite
- MySQL
- phpMyAdmin for database management

## Requirements

Make sure the following are installed:

- PHP 8.3 or newer
- Composer
- Node.js and npm
- MySQL (or XAMPP/WAMP with MySQL)
- phpMyAdmin

## Installation

Clone the repository and enter the project directory:

```bash
git clone <repository-url>
cd job_tracker
```

Install PHP and JavaScript dependencies:

```bash
composer install
npm install
```

Create the environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

## MySQL and phpMyAdmin Setup

1. Start the MySQL service from XAMPP, WAMP, or your local MySQL installation.
2. Open phpMyAdmin, create a database named `job_tracker`, and use `utf8mb4` as the character set if prompted.
3. Update the database values in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job_tracker
DB_USERNAME=root
DB_PASSWORD=
```

Set `DB_USERNAME` and `DB_PASSWORD` to match your local MySQL installation. For example, XAMPP commonly uses the `root` user with an empty password by default.

Run the database migrations:

```bash
php artisan migrate
```

## Optional Sample Data

To add sample job applications, run:

```bash
php artisan db:seed --class=ApplicationSeeder
```

## Running the Application

Start the Laravel and Vite development servers:

```bash
composer run dev
```

Then open [http://localhost:8000](http://localhost:8000) in your browser.

Alternatively, run the servers separately:

```bash
php artisan serve
npm run dev
```

## Testing

Run the test suite with:

```bash
php artisan test
```

## Useful Commands

```bash
php artisan route:list
php artisan migrate:fresh
npm run build
```

## Main Routes

| Method | URL | Purpose |
| --- | --- | --- |
| GET | `/` | Application dashboard |
| GET | `/applications` | List applications |
| GET | `/applications/create` | Create application form |
| GET | `/applications/{application}` | View application details |

The remaining application create, update, and delete routes are provided by Laravel resource routing.

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
