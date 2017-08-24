<?php
  declare(strict_types = 1);

  $injector = new \Auryn\Injector;

  $injector->alias('Http\Request', 'Http\HttpRequest'); // allows us to type-hint the interface 'Http\Request' instead of the class 'Http\HttpRequest', making it possible to switch the implementation wihtout having to edit all our classes that use the old implementation
  $injector->share('Http\HttpRequest'); // shares a single instance of an 'HTP\HttpRequest' object
  $injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER
  ]); // // defines an custom injection definition. Note that it is an array whose keys match the parameter names of Http\HttpRequest's constructor.

  $injector->alias('Http\Response', 'Http\HttpResponse');
  $injector->share('Http\HttpResponse');

  return $injector;
?>
