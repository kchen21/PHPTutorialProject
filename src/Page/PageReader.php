<?php
  declare(strict_types = 1);

  namespace PHPTutorialProject\Page;

  interface PageReader {
    public function readBySlug(string $slug) : string;
  }
?>
