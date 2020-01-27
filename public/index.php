<?php



define("SUB_STRING_COUNT","2000");
define("SECTION_SLUG_HOME","home");
define("SECTION_SLUG_COURSE","course");
define("SECTION_SLUG_DOWNLOAD","downloads");


define("WIDGET_ABOUT_JCI_INDIA",7);
define("WIDGET_WHY_JCI_INDIA",8);
define("WIDGET_FOUNDERS_PERSPECTIVE",9);
define("WIDGET_JCI_MISSION_VISION",10);
define("WIDGET_JCI_VALUES",11);
define("WIDGET_CONTACT_US",12);
define("WIDGET_NATCON_2018_PROMOTION",13);
define("WIDGET_SUSTAINABLE_DEVELOPMENT",14);
define("WIDGET_ONLINE_GD_MRF",15);
define("WIDGET_FOOD_GRAIN_DISTRIBUTION",16);
define("WIDGET_ACHIEVEMENTS",17);


error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('memory_limit', '-1');

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

//error_reporting(-1);
//ini_set('display_errors', 'On');
ini_set('memory_limit', '-1');
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
