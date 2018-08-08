# Setup information

Backend
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. Create database and change the credentials to .env file of the application
5. php artisan migrate
6. php artisan db:seed

Frontend
7. npm install
8. npm run watch / npm run dev

Host for development
9. create new virtual domain - vi /c/Windows/System32/drivers/etc/hosts  	
10. create new configuration - C:\Bitnami\wampstack-7.1.15-0\apache2\conf\extra\httpd-vhosts.conf

Application development
11. php artisan make:model XxxYyyZzz -mcf
12. Change migration file  and add the columns.
13. Open controller file and prepare for CRUD.
12. php artisan make:resource XxxYxxZzz (Same as Model name)
13. Change resource accouding to the table structure
14. Add new routes for the CRUD in api.php
