## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


## To do list

Waiting Syed to implement swiping student card and retrieve barcode and service that retrieve barcode from student number
And waiting client to get back where need to be updated.

## Database
A SQL dump is in the file "TCard Plus SQL tables". run the payment sql when first set up the database. payment_detail is constrained by the payment
id in the payment table as a foreign key. payment table has foreign id: meal_id and meal_detail_id constrained by the table meal_Detail and meal which showing
the details of the meal.You can set up your database in the config/database.php file.

```
'mysql' => [
			'driver'    => 'mysql',
			'host'      => env('DB_HOST', 'localhost'),
			'database'  => env('DB_DATABASE', 'tcardplus'),
			'username'  => env('DB_USERNAME', 'root'),
			'password'  => env('DB_PASSWORD', '123qwe'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			'strict'    => false,
		]
```
Change the database, username, and password to fit your set up.

## Basic Functionality of the application

There are two types of users : admin and regular users. Regular users can submit a form to the database while admin can
submit a form as well as check report of the info about the forms submitted in his/her interested time range.

## Setting up the environment


Add this to the bottom of your httpd.conf file in your apache files:
```
Alias /webapps/project_name "path to project's public file"

<VirtualHost *:80>
    DocumentRoot "path to project's public file"

    <Directory "path to project's public file"">
	Options Indexes FollowSymLinks
	AllowOverride all
	Require all granted
	php_value register_globals 1
    </Directory>
</VirtualHost>
```
with this you can view the application with localhost/webapps/project_name in your browser.

## An important feature

You can simply set your environment by add /setenv to end of your url, for example localhost/webapps/project_name/setenv
this will check your env and determinate automatically whether you are in local, beta or production env and therefore switch
env file to use for you.

Make your .htaccess in your project's public file look like so:
```
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On
    RewriteBase /webapps//tcardplus

    # Redirect Trailing Slashes...
    RewriteRule ^(.*)/$ /$1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```
When you commit to beta comment out the rewrite base
