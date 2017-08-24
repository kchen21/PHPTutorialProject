<?php
  declare(strict_types = 1);

  namespace PHPTutorialProject\Template;

  interface Renderer {
    public function render($template, $data = []) : string; // return type declaration, introduced in PHP 7
  }

?>
