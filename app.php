<?php

/**
 * Chargement et initiaisation de l'application.
 */
require __DIR__ . '/vendor/autoload.php';

use Nette\DI\Container;

$loader = new Nette\DI\ContainerLoader(__DIR__ . '/temp',true);
$class = $loader->load(function($compiler)
{
    $compiler->loadConfig(__DIR__ . '/books.neon');
});
/**
 * @var \Nette\DI\Container $container
 */
$container = new $class;

/**
 * Création de l'instance $mybook.
 */
$mybook = new \Book\Book( $container);

/**
 * Partie a personaliser
 */
$mybook->createBook('test.md', 'alone');
$mybook->run();
