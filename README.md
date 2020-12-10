## Project Manager System
This project is created by Laravel 7 with livewire, and it is under development. and will be upgraded Laravel version from 7 to 8.


- - - - -

![pms screenshot](https://i.ibb.co/Tk2xbKW/image.png)
![pms screenshot1](https://i.ibb.co/DwcMzZ9/image.png)
![pms screenshot2](https://i.ibb.co/L6bYL4L/image.png)


## About Laravel
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.



## Usage
This is a system it allows the project manager to create projects and add tasks to each employee in project with a simple dashboard.

Clone the repo : `git clone https://github.com/fahadxt/pms`
- Create new MySQL database for this application
`$ cd pms`
`$ cp .env.example .env`
- Set database credentials on .env file
`$ php artisan key:generate`
`$ composer install`
`$ php artisan migrate --seed` (it has some seeded data - see in credentials)
`$ php artisan storage:link`
`$ php artisan serve`
Visit http://127.0.0.1:8000 via web browser

### credentials

`Email : superadmin@example.com`
`Password : 123123123`
