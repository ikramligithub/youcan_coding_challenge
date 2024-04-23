# YouCan Coding Challenge (Laravel & VueJS)
This is my solution to the fullstack Coding challenge by YouCan.
## Installation
Start by cloning the repository.

```bash
 git clone https://github.com/ikramligithub/youcan_coding_challenge
```
## Database

The file `product-app-db.sql` contains the SQL script to create the application's database. You can import it into your database management system (e.g., MySQL, PostgreSQL) to set up the necessary database for the application.

### Instructions for importing the SQL file:

1. Make sure you have a database management system installed on your machine, such as MySQL or PostgreSQL.
2. Create a new empty database in your database management system.
3. Use a tool like PhpMyAdmin or the command line to import the `product-app-db.sql` file into your newly created database.

## Backend 

### Go to the Backend Directory

Navigate to the backend directory:

```bash
cd Backend
```
### Install Dependencies
Install the required dependencies using Composer:
```bash
composer install
```
### Set Environment Variables
Make sure to set the correct environment variables. Refer to your project documentation for details on which variables need to be set and their values.

### Start the Server
Launch the server using Artisan:

```bash
php artisan serve
```

## Frontend

### Go to the frontend Directory

Navigate to the frontend directory:


```bash
cd Frontend
```
### Install Dependencies

```bash
 npm install
```
### Environment Variable

Add the backend base URL environment variable:

```plaintext
export const backendBaseUrl = 'http://127.0.0.1:8000/api';
```
### Start the server
```bash
 npm run dev
```
## CLI
To add a product from the CLI, use the following command:
```bash
php artisan product:create {name} {description} {price} {image url} {--c|categories=*}
```


