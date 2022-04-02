<?php

/**
 * Chargement et initiaisation de l'application.
 */

require __DIR__ . '/vendor/autoload.php';

/**
 * Création de l'instance $mybook.
 */
$mybook = new \Book\Book();

/**
 * Partie a personaliser
 */
$mybook->createBook('test.md','alone');
$mybook->run();