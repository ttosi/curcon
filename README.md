## Curcon - A Currency Converter

Allows a user to easily see exchanges rates between different currencies.

A user creates one or more conversions. A conversion defines the "to be converted from" currency and the amount to be converted. A user then adds one more currencies to see the going exchange rate between the base and quote currencies.

## Run in local development
Clone repo

```
git clone https://github.com/ttosi/curcon.git
```

The client and the API run independently.

### API
In the `curcon/laravel-api` directory rename or copy `.env.example` to `.env`

In `.env` add 

```
SWOP_API_KEY=[your swop.cx api key here]
```
and update the database variables to fit your needs

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=curcon
DB_USERNAME=root
DB_PASSWORD=
```

Run the following commands in the `curcon/laravel-api` directory

```
composer install

php artisan db:create

php artisan migrate

php artisan db:seed

php artisan serve
```

Ensure the api is running on port 8000

### Client

Run the following commands in the `curcon/vue-client` directory

```
npm install

npm run serve
```

or if you use yarn
```
yarn

yarn serve
```

In a browser navigate to `http://localhost:8080/login`

Login in with
```
user@gmail.com
password
```
