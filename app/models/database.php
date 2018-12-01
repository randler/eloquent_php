<?php
namespace Models;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Schema;

class Database {
	function __construct(){
	$capsule = new Capsule;
	$capsule->addConnection([
	    'driver'    => DBDRIVER,
	    'host'      => DBHOST,
	    'database'  => DBNAME,
	    'username'  => DBUSER,
	    'password'  => DBPASS,
	    'charset'   => 'utf8',
	    'collation' => 'utf8_unicode_ci',
	    'prefix'    => '',
	]);

	// Listening to all queries
$capsule->getConnection()->listen(function ($query) {
	print_r($query);
  });
   
  // Enabling query log
  $capsule->getConnection()->enableQueryLog();
   
  // Getting array of executed queries
  $capsule->getConnection()->getQueryLog();
  
// Set the event dispatcher used by Eloquent models... (optional)
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
	}
}