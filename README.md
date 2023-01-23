# Installation Guide

Make sure your device has been installed following requirements:

- PHP 7.3.x
- Composer
- Node Version 16.x
- Mysql DB

## Installation

Install the Laravel's package first by using this command

```bash
composer update
```

Install the React's package by using

```bash
npm install
```

Copy the .env file

```bash
cp .env.example .env
```

Generate a new security key

```bash
PHP artisan key:generate
```

Make sure to change the database credentials in the .env file, after you change it, run this command to migrate the tables

```bash
PHP artisan migrate --seed
```


Run the React development using

```bash
npm run watch
```


> If you in production environment please use

```bash
npm run production
```


Run the server to access this website

```bash
PHP artisan serve
```
