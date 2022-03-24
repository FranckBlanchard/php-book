<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__ . '/app/config.php';
/**
 * Création de l'instance $mybook.
 */
/**
 * @var array<array<string>> $chapitres
 */

$mybook= new \Book\Book($path,$Chapitres);

$mybook->addChapter(array ('Chapitre x','chapitre-x','chapitrex.md'));
