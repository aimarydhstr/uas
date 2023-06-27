# UAS Pemrograman Web

## Installation

Clone the repository

    git clone https://github.com/aimarydhstr/uas.git

Switch to the repo folder

    cd uas

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Export the database uas.sql (**Set the database connection in .env before exporting**)

    DB_DATABASE=uas

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
