<p align="center"><h1 align="center">PHP 7 Starter kit</h1></p>

<p align="center">
<a href="http://eyepax.com">Eyepax IT Consulting (Pvt) Ltd</a>
</p>

## About PHP 7 Starter kit

This is a starter kit for those who are looking to build an application with PHP 7. This is an enhanced build of [PHP7 Boilerplate](https://github.com/relevo/php7-boilerplate). The additions are

- Configured [PHRoute](https://github.com/mrjgreen/phroute) and fixed DI issues with PHP-DI.
- Configured [PHP dotenv](https://github.com/vlucas/phpdotenv).
- Added MySQL connectivity and ORM packages.
- Configuration file management.
- Input handling.

## Using the PHP 7 Starter kit

This starter kit is designed to use with ease. It has well defined folder structure.

- "config" folder has configuration files, which you can add as many files as you want. You can access the config values from anywhere, by calling the file name and keys with dot notation. Eg: <i>config('general.pagination_per_page')</i>
- Can define environment variables in .env file and can call them using <i>env()</i> function. A sample env file is given (.env.example).
- src/app folder has the controllers, libraries, models and repositories.
- src/resources folder can have the template view files.
- src/routes.php can have the routes for the application. For more details on the routing, please check the PHRoute documentation.
- All the Input values can be retrieved using Laravel style. To get all input values, use <i>Input::all()</i>, and to get a specific value use <i>Input::get('item')</i>.
- phpcs is configured. So, can make the code comply with PSR standards.
- <i>url()</i> function will give you the URL of the application. You can append a part of URL by passing it as an argument. Eg: url('users') will give you http://<url-of-app>/users.
- <i>storage_path()</i>, function will give you the relative path for the storage folder. So you can save the uploaded files there.
- <i>public_path()</i>, function will give you the relative path for the web folder.

## Quick start

Install with composer.

```bash
composer create-project EyepaxPrasanna/php7-starter-kit <project-path>
```
