# Mukuru developement test

Hi Mukuru team :) So i decided to use laravel for this test.

You can find all of the Tests business logic in **server/app/Mukuru**

All specific configurations for this test can be found in **server/config/mukuru.php**

You run run the system tests but you will have to recreate the database by running

```
$ php artisan migrate --seed
```

# Installation Instructions
-------------------------

These installion instructions assume that your developement enviroment is up and running. 


1. Clone this repository. 
```
 $ git clone https://github.com/justlyall/exchange-rate-api.git
```

2. Change to the server directory and run 
```
 $ composer install
```

3. Create a MySQL database and edit the application database settings located in **server/.env** to match these settings

4. Create the tables and seed the test data by running

```
$ php artisan migrate --seed
```

If you have gotten this far then hopefully everything should be working.

maybe do a quick check to see if the server is running smoothly

Run curl/open your browser and navigate to http://localhost/server/public/api/v1/currencies this should output a list of currencies 

If that is working then you are ready to experiance this awesome.

Open your browser and navigate to http://localhost/frontend

# API Url endpoints
-------------------------

Example of the api endpoint

    http://localhost/server/public/api/v1/[currencies|orders|purchase]

**[GET]**  currencies - list all currencies       
**[GET]**  orders - list all orders      
**[POST]** purchase - [amount, currencyCode] - create and returns the order 
      
  
# Update Exchange rate

To update the exchange rates run 

```
php artisan update-exchange-rates
```
