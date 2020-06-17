echo Copying the configuration example file
docker exec -it gameking-app cp .env.example .env

echo Install dependencies
docker exec -it gameking-app composer install

echo Generate key
docker exec -it gameking-app php artisan key:generate

echo Make migrations
docker exec -it gameking-app php artisan migrate

echo Make seeder
docker exec -it gameking-app php artisan db:seed

echo Symbolic link
php artisan storage:link
