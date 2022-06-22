# Getting Started</h1>
1. Your system should be up to date to support Laravel 9. This project was built on a Mac, so installation may vary.
2. Have Dokcer Desktop Installed
3. Once the project is cloned, you can bring up the containers in the root with ./vendor/bin sail up.
4. Once that is running you can do a docker ps to get the name of the docker container. 
5. Shell into the container (docker exec -ti eventfinity-backend-laravel.test-1 sh) and run the migrations (php artisan migrate)
6. The Blog.postman_collection.json can be imported into Postman to play around with the api without the front end running.
7. All routes live in the api.php directory.

<h2>Some notes</h2>
- Laravel has a lot of boilerplate, essentially all the code I wrote can be found in: Models/, routes/api.php, Http/Controllers. Http/Resources, and Http/Requests.
- Authentication is handled with Laravel's Sanctum. I haven't used it until now but it is very simple to use.
- There are 3 models that make up this backend, Posts, Comments, and Users. They all have full CRUD support, except for Users, which can only be created.
- Basic validation is handled via api Laravel's Form Requests.
***

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
