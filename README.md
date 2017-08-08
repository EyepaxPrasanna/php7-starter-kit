<p align="center"><h1 align="center">PHP 7 Starter kit</h1></p>

<p align="center">
<a href="http://eyepax.com">Eyepax IT Consulting (Pvt) Ltd</a>
</p>

## About PHP 7 Starter kit

This is a starter kit for those who are looking to build an application with PHP 7. This is an enhanced build of [PHP7 Boilerplate](https://github.com/relevo/php7-boilerplate). The additions are

- Configured [PHRoute](https://github.com/mrjgreen/phroute) and fixed DI issues with PHP-DI.
- Configured [PHP dotenv](https://github.com/vlucas/phpdotenv).
- Added MySQL connectivity and ORM packages using [PHP-MySQLi-Database-Class](https://github.com/joshcam/PHP-MySQLi-Database-Class).
- Configuration file management.
- Input handling.

## Quick start

Install with composer.

```bash
composer create-project eyepax-prasanna/php7-starter-kit <project-path> -s dev
```

## Using the PHP 7 Starter kit

This starter kit is designed to use with ease. It has well defined folder structure.

- <i><b>config</b></i> folder has configuration files, which you can add as many files as you want. You can access the config values from anywhere, by calling the file name and keys with dot notation. <b>Eg: <i>config('general.pagination_per_page')</i></b>
- Can define environment variables in .env file and can call them using <b><i>env()</i></b> function. A sample env file is given (.env.example).
- <i><b>src/app</b></i> folder has the controllers, libraries, models and repositories.
- <i><b>src/resources</b></i> folder can have the template view files.
- <i><b>src/routes.php</b></i> can have the routes for the application. For more details on the routing, please check the [PHRoute](https://github.com/mrjgreen/phroute) documentation.
- All the Input values can be retrieved using Laravel style. To get all input values, use <i><b>Input::all()</b></i>, and to get a specific value use <i><b>Input::get('item')</b></i>.
- phpcs is configured. So, can make the code comply with PSR standards.
- <i><b>url()</b></i> function will give you the URL of the application. You can append a part of URL by passing it as an argument. <b>Eg: url('users') will give you http://{url-of-app}/users</b>.
- <i><b>storage_path()</b></i>, function will give you the relative path for the storage folder. So you can save the uploaded files there.
- <i><b>public_path()</b></i>, function will give you the relative path for the web folder.
- <i><b>dd('contents')</b></i> will print and die (A Laravel style function).
