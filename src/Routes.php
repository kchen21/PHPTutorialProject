<?php
  declare(strict_types = 1);

  return [
    ['GET', '/', ['PHPTutorialProject\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['PHPTutorialProject\Controllers\Page', 'show']] // $params will receive the slug of the page
  ];
?>
