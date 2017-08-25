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

  // $injector->alias('PHPTutorialProject\Template\Renderer', 'PHPTutorialProject\Template\MustacheRenderer');
  $injector->define('Mustache_Engine', [
    ':options' => [
      'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
        'extension' => '.html'
      ])
    ]
  ]);

  $injector->define('PHPTutorialProject\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages'
  ]);

  $injector->alias('PHPTutorialProject\Page\PageReader', 'PHPTutorialProject\Page\FilePageReader');
  $injector->share('PHPTutorialProject\Page\FilePageReader');

  $injector->alias('PHPTutorialProject\Template\Renderer', 'PHPTutorialProject\Template\TwigRenderer');
  $injector->delegate('Twig_Environment', function () use ($injector) { // We use delegate to give the responsibility of instantiating a class to a function
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
  });

  return $injector;
?>
