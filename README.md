# Client Manager
Client Manager is built using [Laravel 5.1](http://laravel.com). It manage your client information and make your life easier. :D

[![Build Status](https://travis-ci.org/Amrit01/client-manager.svg?branch=master)](https://travis-ci.org/Amrit01/client-manager)
[![StyleCI](https://styleci.io/repos/47721899/shield)](https://styleci.io/repos/47721899)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/Amrit01/client-manager.svg?style=flat-square)](https://scrutinizer-ci.com/g/Amrit01/client-manager/?branch=master)

## TODO
1. Implement phone number validator. Thinking of implement [Laravel Phone](https://github.com/Propaganistas/Laravel-Phone)
2. Better testing.
3. Config for Client options like min age of client,page page result etc.
4. Thinking

## Installation
[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.6+, a database server, and [Composer](https://getcomposer.org) are required.

1. There are 2 ways of grabbing the code:
  * Use GitHub: simply download the zip on the right of the readme
  * Use Git: `git clone git@github.com:Amrit01/client-manager.git`
2. From a command line open in the folder, run `composer install --no-dev -o`.
3. Config Application by simply copying .env.example to .env .
4. Run `php artisan key:generate` to set the application key.
6. Finally, setup an [Apache VirtualHost](http://httpd.apache.org/docs/current/vhosts/examples.html) or [Nginx Server Blocks](https://www.nginx.com/resources/wiki/start/topics/examples/server_blocks) to point to the "public" folder.
  * For development, you can simply run `php artisan serve`

## Developer
### Implement your own Store
Right now client information is stored in csv file in `storage/app/client.csv`. If your are thinking of implementing your own store, you can do it very easily.
Lets suppose you want to save it in a plain text file or in mysql database or any other store.

1. Create your own store class like the on below. Make sure you implement `App\Repositories\Client\Contracts\Store` Contract.
```php
    use App\Repositories\Client\Contracts\Store;
    class FileStore implements Store
    {
        /**
         * Get paginated client list.
         *
         * @param $perPage
         * @param $request
         *
         * @return mixed
         */
        public function paginated($perPage, $request){
            //your code here to retrive data from your storage.
        }

        /**
         * Store Requested data.
         *
         * @param $request
         *
         * @return mixed
         */
        public function store($request)
        {
            // your code here to store requested form data to your storage.
        }

    }
```
2. Open file `app/Providers/AppServiceProvider` and look for function `registerClientStore` then replace `App\Repositories\Client\CsvStore` with your own implemented class.
3. Happy Coding.

### You can design it better
This project makes use of Bower and Laravel Elixir. Before triggering Elixir, you must first ensure that Node.js (included in homestead) is installed on your machine.

1. First run `npm install` to install node dependencies then run `bower install`( Retrieve frontend dependencies).
2. I think it will be better your look at the [Laravel Elixir](http://laravel.com/docs/5.1/elixir) documentation once if you don't know what it is.
3. Happy Coding :) :) :)