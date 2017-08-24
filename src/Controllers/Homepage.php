<?php
  declare(strict_types = 1);

  namespace PHPTutorialProject\Controllers;

  use Http\Response;

  class Homepage {
    private $response;

    public function __construct(Response $response) {
      $this->response = $response;
    }

    public function show() {
      echo 'Hello World';
    }
  }

?>
