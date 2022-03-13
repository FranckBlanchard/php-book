<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__ . '/app/config.php';

$mybook= new \Book\Book($Chapitres);

var_dump ($mybook);
$mybook->addChapter(array ('Chapitre x','chapitre-x','chapitrex.md'));
var_dump ($mybook);