<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About this repository

This is a super basic introduction to working with Laravel and migrations using a Bookstore as a domain.

### QUICKSTART

* From the root of the project run `composer install`
* Rename the `.env.example` file to `.env`, edit it with the following information:

```
APP_NAME=yourappnamehere
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost
```

* After having done the steps above run the following command, from the root of the         project:

```
php artisan key:generate
```

If that is successfull you should get something like this message in your shell:

    Application key [randomlettersandnumershere] set successfully.

* Make sure your Homestead virtual machine is running and then navigate to your project in your browser of choice. If you've followed my setup the
  application should be available at http://bookstore.dev

* Now, run `vagrant ssh` in homestead your homestead directory (`~/Homestead`)
* Change directory to: `cd /home/vagrant/code/laravel-bookstore`, then run `php artisan migrate` to run the migrations, which will generate the needed tables for the application. If that is successful you can exit the VM with the command `exit`. This should bring you back to the `~/Homestead` directory).

Now you're ready to develop!

---

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
