in config/app.php add to providers:
Nezaboravi\Ladmin\LadminServiceProvider::class,

php artisan vendor:publish --tag=migrations
php artisan vendor:publish --tag=seeds
composer dump-autoload -o
php artisan migrate
php artisan db:seed --class=AdminUsersTableSeeder

NOW YOU should try to LOGIN AS
admin@ladmin.com / ladmin

#################################
//go and add to kernel.php
#################################
protected $routeMiddleware = [
         ..... other middlewares ....
        'admin_auth' => \Nezaboravi\Ladmin\Http\Middleware\AuthenticateAdmin::class,
        'admin_guest' => \Nezaboravi\Ladmin\Http\Middleware\RedirectIfAdminAuthenticated::class,
     ];
     
##############################
In config/auth.php add
##############################
in guards array:

// Our new custom driver.
'web_admin' => [
 'driver' => 'session',
 'provider' => 'admins',
],

and in providers array add this:
// admins user provider
'admins' => [
    'driver' => 'eloquent',  //We are using eloquent model
    'model' => \Nezaboravi\Ladmin\Admin::class,
],