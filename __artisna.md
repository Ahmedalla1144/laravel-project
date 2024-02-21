# Migrations
php artisan make:migration create_items_table

php artisan make:migration add_column_to_items_table

php artisan make:migration change_column_in_items_table

php artisan make:migration make_changes --table=items

<!-- Run new migrations -->
php artisan migrate

<!-- Rolling back and re-migrate -->
php artisan migrate:refresh

<!-- Drop all tables and re-migrate -->
php artisan migrate:fresh

<!-- Check Migration Status -->
php artisan migrate:status

<!-- Fake data -->
 php artisan db:seed --class=UserSeeder