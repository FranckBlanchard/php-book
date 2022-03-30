<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/app/config.php';
/**
 * Création de l'instance $mybook.
 */
/**
 * @var array<array<string>> $chapitres
 */
$mybook = new \Book\Book($path);
$mybook->addChapter('avant-propos.md');
$mybook->addChapter('chapitre2.md');
$mybook->setHtmlMode('standalone');
$htmlBook = new \Book\PandocBuildHtml();
$htmlBook->setMarkdownFileName("app/src/avant-propos.md");
$htmlBook->setHtmlFileName("app/build/avant-propos.html");
var_dump($htmlBook);
$htmlBook->build();
