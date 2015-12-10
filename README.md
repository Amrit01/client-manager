# Client Manager

[![StyleCI](https://styleci.io/repos/47721899/shield)](https://styleci.io/repos/47721899)

## Installation
[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.6+, a database server, and [Composer](https://getcomposer.org) are required.

1. There are 2 ways of grabbing the code:
  * Use GitHub: simply download the zip on the right of the readme
  * Use Git: `git clone git@github.com:Amrit01/client-manager.git`
2. From a command line open in the folder, run `composer install --no-dev -o` and then `npm install` and `bower install`.
3. Enter your database details by simply copying .env.example to .env .
4. Run `gulp --production` to setup the application.
6. Finally, setup an [Apache VirtualHost](http://httpd.apache.org/docs/current/vhosts/examples.html) to point to the "public" folder.
  * For development, you can simply run `php artisan serve`


