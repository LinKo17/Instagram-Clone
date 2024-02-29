Mini Instagram Clone

###########
Follow this instruction to run this project

- put your own (.env) file to this project
- 
In .env file,change this part for mail system.

- MAIL_MAILER=smtp

- MAIL_HOST=mailpit

- MAIL_PORT=1025

- MAIL_USERNAME=null

- MAIL_PASSWORD=null

- MAIL_ENCRYPTION=null

- MAIL_FROM_ADDRESS="hello@example.com"

- MAIL_FROM_NAME="${APP_NAME}"

put your own mail part. If you don't know how to do that watch this video => https://youtu.be/WI5dHACiOjQ?list=PLm8sgxwSZofdIdWQxDhg3HUplNJIZRjqb

start watch 30:40 to 33:00 and do like that tutorial .

### Run these commends step by step

- composer install

- composer dump-autoload

- npm install

- npm run build

- php artisan migrate

- php artisan serve
