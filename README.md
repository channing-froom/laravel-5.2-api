# laravel-5.2-api
Laravel 5.2 app cases

# installation
1. Clone project
2. Create new database
3. Run Custom mySql migration scripts : /database/migrationScripts/22-05-2016.setup.sql
4. Run composer : composer install
5. Create .env file with your own settings
6. Define ownership of the Directory in terminal : chown -R {pc-name}:www-data ./
7. Open Postman and import scripts : /Laravel-api.postman_collection.json

# TODO
Most of the methods in the application are example methods and could be refined. 
Move Validation in the Request validation and adapt the error method for request objects for API.

# API
A user is automatically generated if none have been created. 
email : channing@froomiethought.co.za
password : p

## Users
1. View all
2. View single
3. Create

## Locations
1. View all
2. View single
3. Create

## Access
To gain access to all the calls you need to generate a API token : script provided.
The Token needs to be placed in the header of each request which will validate the request and user.


# Migrations & Models
Im currently using the default ORM for models but i am not using any of the default migrations.
This is because i feel its important for people to understand the correct way to layout tables and relations.

Iv taken 2 approaches to the model,
1. default structure and behavior for models
2. Data Mapper as seen in the users Model where the methods are defined and easily tracked.

# Frontend
NONE


