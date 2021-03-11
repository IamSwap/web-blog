# Installation & Setup

To get started, clone the repository first and then install composer packages.

```bash
git clone git@github.com:IamSwap/web-blog.git
composer install
```

After installing composer packages, create `.env` by copying `.env.example` file.

```bash
cd web-blog
cp .env.example .env
```

Then, generate the application key by running the following command in the terminal.

```bash
php artisan key:generate
```

After this step, setup database credentials in the `.env` file.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_blog
DB_USERNAME=root
DB_PASSWORD=
```

We are almost ready now! Run the following command to run database migrations, it will create tables in the configured database.

```bash
php artisan migrate
```

## Create an admin user

To get started, first we need to generate an admin user for our application. Run the following command in the terminal and it will prompt you for the user details like name, email, and password.

```bash
php artisan admin:create
```

## Import posts from the API

The application offers to import posts via API (`https://sq1-api-test.herokuapp.com/posts`). To import these posts from the API, run the following command in the terminal.

```bash
php artisan import:posts
```

By default, this command is scheduled to run every hour.

# Testing

To run the tests simple run following command from the root directory.

```bash
./vendor/bin/phpunit
```
