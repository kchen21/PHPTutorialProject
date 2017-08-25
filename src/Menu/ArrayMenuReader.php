<?php
  declare(strict_types = 1);

  namespace PHPTutorialProject\Menu;

  class ArrayMenuReader implements MenuReader {
    public function readMenu() : array {
      return [
        ['href' => '/', 'text' => 'Homepage'],
        ['href' => '/page-one', 'text' => 'Page One'],
        ['href' => '/page-two', 'text' => 'Page Two'],
      ];
    }
  }
?>
