

# Quick calculators steps

calculators is the Normal Quiz application build with the Laravel Framework & Passport rest API.This will be useful for the calculate the values.

## Getting Started

* Clone this repo to your local machine using https://github.com/viitoradmin/quickcalc.git

You need to install the following:

### Installing

Follow the below steps to install Laraquiz into your system:
```
cd quickcalc
```
```
composer install
```
Copy ```.env.example``` sample file to ```.env``` file and configure accordingly.
Run ```php artisan passport:install``` 

Run ```php artisan key:generate``` 

Run ```php artisan migrate``` 

start ```php artisan serve```

command to set the application key into your .env file. **If the application key is not set, your user sessions and other encrypted data will not be secure!**

Development approach

1. Laravel installation setup 
```composer create-project --prefer-dist laravel/laravel calculator```

2. Api Passport setup
``` composer require laravel/passport```
 

3. Bootstrap for form design

4. Validator setup for validation

* Demo :  https://quickcalc.peppyemails.com/



## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details




