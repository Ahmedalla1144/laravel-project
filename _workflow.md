# 1
Create the Db Diagram

# 2
Instal laravel App

# 3
Set the database .env

# 4
Create all Models and related files (8)
* php artisan make:model Post -a

** NOTE: create the most parent tables first **

# 5
Create tables difinations in migration files under database->migrations

# 6 -> for testing
Prepare fake data under database->factories

# 7 -> inject fake data into tables
prepare the seeders under database->seeders

-- DatabaseSeeder.php
* php artisan db:seed

** or one by one **
* php artisan db:seed --class=PostSeeder

# 8 Relationships